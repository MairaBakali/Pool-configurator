<?php

namespace App\Http\Controllers\Cron;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Config;
use App\Models\Product;
use App\Models\ProductLog;

class JobsController extends Controller
{
    public function fetchProductFromShopware()
    {
        // Get data from Config table
        $config = Config::first();

        // Setting offset and limit
        $offset = 0;
        $limit = 5;
        $productLog = ProductLog::first();
        if ($productLog) {
            $offset = $productLog->total_product_api_call;
        }

        // Get Products from Shopware API
        $response = Http::withDigestAuth($config->user_name, $config->api_key)->get($config->shop_url . '/api/articles', [
            'limit' => $limit,
            'start' => $offset
        ]);

        // Get json from API response
        $products = $response->json()['data'];
        if (count($products) > 0) {

            // Count number of entries
            $productCounter = 0;
            // Count number of loop
            $counter = 0;
            foreach ($products as $product) {
                // Get Product Detail from Shopware API
                $response = Http::withDigestAuth($config->user_name, $config->api_key)->get($config->shop_url . '/api/articles/' . $product['id']);
                if ($response->status() === 200) {

                    // Select data index from API response
                    $product_detail = $response->json()['data'];

                    $categoryOne = $this->categoryURLToArray(strtolower($config->category_url_1));
                    $categoryTwo = $this->categoryURLToArray(strtolower($config->category_url_2));

                    if (in_array(strtolower($product_detail['propertyGroup']['name']), $categoryOne) ||
                        $this->checkCategories($product_detail['categories'], $categoryTwo)) {

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
                        $saved = $productModle->save();
                        if ($saved) {
                            $productCounter++;
                        }

                    }
                    $counter++;
                }
            }

            // Check and save numbers of api calls in database
            $productLog = $productLog ? $productLog : new ProductLog;
            $productLog->total_product_api_call = ($offset + $counter);
            $productLog->save();

            return [
                'message' => [
                    "totalProductAddedInDatabase" => $productCounter
                ],
                "Status" => 200
            ];
        }
        // This will run when no response come from API
        return [
            'message' => [
                "noNewProductFound" => '0 Product add in database',
            ],
            "Status" => 204
        ];
    }

    private function categoryURLToArray($categoryURL)
    {
        // Removing slash from start and end
        $categoryPathname = rtrim(ltrim($categoryURL, '/'), '/');
        // Convert in array
        $categoryArray = explode("/", $categoryPathname);
        return $categoryArray;
    }

    public function checkCategories($categories, $categoriesURLArray)
    {
        $categoriesArray = explode(',', $this->getCategory($categories));
        $matchCategories = 0;
        foreach ($categoriesArray as $category) {
            if (in_array(strtolower($category), $categoriesURLArray)) {
                $matchCategories++;
            }
        }
        return ($matchCategories > 0) ? true : false;
    }

    private function getCategory($categories)
    {
        $categoryNames = [];
        foreach ($categories as $category) {
            $categoryNames[] = $category['name'];
        }
        return implode(",", $categoryNames);
    }

    private function calculatePrice($price, $tax)
    {
        // $tax percent of $price
        return round((($tax / 100) * $price) + ($price),2);
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
