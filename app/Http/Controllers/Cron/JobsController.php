<?php

namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Config;
use App\Models\Product;

class JobsController extends Controller
{
    public function fetchProductFromShopware($offset = 0, $limit = 4, $productCounter = 0)
    {
        // Get data from Config table
        $config = Config::first();

        // Get Products from Shopware API
        $response = Http::withDigestAuth($config->user_name, $config->api_key)->get($config->shop_url . '/api/articles', [
            'limit' => $limit,
            'start' => $offset
        ]);

        // Get json from API response
        $products = $response->json()['data'];

        if (count($products) > 0) {

            // Count number of loop
            $counter = 0;

            // Hash from database
            $result = Product::select('id', 'hash_id')->get()->toArray();

            # Returns an array of values representing a single column from the input array.
            $hash_from_db = array_column($result, 'hash_id');

            foreach ($products as $product) {

                // Generating sha1 hash for checking
                $hash = sha1($product['changed'] . $product['mainDetail']['number']);

                // Checking that product is not in database
                if (!in_array($hash, $hash_from_db)) {

                    // Get Product Detail from Shopware API
                    $response = Http::withDigestAuth($config->user_name, $config->api_key)->get($config->shop_url . '/api/articles/' . $product['id']);
                    if ($response->status() === 200) {
                        // Check that current product is modified that delete old one
                        $result = Product::select('id')->where('order_number', '=', $product['mainDetail']['number'])->get();
                        if (count($result) > 0) {
                            Product::destroy($result[0]['id']);
                        }

                        // Select data index from API response
                        $product_detail = $response->json()['data'];

                        // Base products category form config table
                        $base_products_category = $this->trimCategory(strtolower($config->base_products_category));
                        // Compatible or related products category form config table
                        $compatible_products_category = $this->trimCategory(strtolower($config->compatible_products_category));
                        // Service & Assembly Product Category  form config table
                        $product_services_category = $this->trimCategory(strtolower($config->product_services_category));
                        // $categories array from $product_detail or single article API response
                        $categories = array_map('strtolower', array_column($product_detail['categories'], 'name'));

                        if (in_array($base_products_category, $categories) || in_array($compatible_products_category, $categories) || in_array($product_services_category, $categories)) {

                            $productModle = new Product;
                            $productModle->product_id = $product_detail['id'];
                            $productModle->detail_id = $product_detail['mainDetailId'];
                            $productModle->name = $product_detail['name'];
                            $productModle->description_long = $product_detail['descriptionLong'];
                            $productModle->active = $product_detail['active'];
                            $productModle->order_number = $product_detail['mainDetail']['number'];
                            $productModle->in_Stock = $product_detail['mainDetail']['inStock'];
                            $productModle->stock_min = $product_detail['mainDetail']['stockMin'];
                            $productModle->shipping_free = $product_detail['mainDetail']['shippingFree'];
                            $productModle->customer_group_key = $product_detail['mainDetail']['prices'][0]['customerGroupKey'];
                            $productModle->tax_percent = $product_detail['tax']['tax'];
                            $productModle->price = $this->calculatePrice($product_detail['mainDetail']['prices'][0]['price'], $product_detail['tax']['tax']);
                            $productModle->property_group = strtolower($product_detail['propertyGroup']['name']);
                            $productModle->category = $this->getCategory($product_detail['categories']);
                            $productModle->media = $this->getMedia($product_detail['images'], $config);
                            $productModle->attr1 = $product_detail['mainDetail']['attribute']['attr1'];
                            $productModle->attr2 = $product_detail['mainDetail']['attribute']['attr2'];
                            $productModle->attr3 = $product_detail['mainDetail']['attribute']['attr3'];
                            $productModle->hash_id = $hash;
                            $saved = $productModle->save();
                            if ($saved) {
                                $productCounter++;
                            }

                        }


                    }
                }

                $counter++;
            }

            // Calling function again to fetch new record
            $newOffset = ($offset + $counter);
            $this->fetchProductFromShopware($newOffset, $limit, $productCounter);

        }

        return "Database updated successfully";
    }


    private function trimCategory($category)
    {
        // Removing slash from start and end
        return rtrim(ltrim($category, '/'), '/');
    }

    private function calculatePrice($price, $tax)
    {
        // $tax percent of $price
        return round((($tax / 100) * $price) + ($price), 2);
    }

    private function getCategory($categories)
    {
        $categoryNames = [];
        foreach ($categories as $category) {
            $categoryNames[] = $category['name'];
        }
        return implode(",", $categoryNames);
    }

    private function getMedia($images, $config)
    {
        $imagesPath = [];
        foreach ($images as $img) {
            // Checking if mediaId not equal to Null
            if ($img['mediaId']) {
                // Get Media from Shopware API
                $response = Http::withDigestAuth($config->user_name, $config->api_key)->get($config->shop_url . '/api/media/' . $img['mediaId']);
                if ($response->status() === 200) {
                    $imagesPath[] = $response->json()['data']['path'];
                }
            }
        }
        return implode("~", $imagesPath);
    }
}
