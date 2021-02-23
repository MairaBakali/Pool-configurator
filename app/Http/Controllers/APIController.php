<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Product;
use App\Models\BundleProduct;
use Response;
use App\Helpers\HelperFunctions;

class APIController extends Controller
{
    public function getBaseProducts(Request $request)
    {
        // Get data from Config table
        $config = Config::first();
        // Removing slash from start and end
        $base_products_category = rtrim(ltrim(strtolower($config->base_products_category), '/'), '/');
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;
        $products = Product::where('category', 'LIKE', "%$base_products_category%")->offset($offset)->limit($limit)->get();

        // creating response
        $response = HelperFunctions::createResponse($products);
        $status = 200;
        return Response::json($response, $status);
    }

    public function getCompatibleProduct(Request $request)
    {
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;
        $products = Product::whereIn('order_number', $request->input('order_number'))->offset($offset)->limit($limit)->get();

        // creating response
        $response = HelperFunctions::createResponse($products);
        $status = 200;
        return Response::json($response, $status);
    }

    public function getProductService(Request $request)
    {
        // Get data from Config table
        $config = Config::first();
        // Removing slash from start and end
        $product_services_category = rtrim(ltrim(strtolower($config->product_services_category), '/'), '/');
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;
        $products = Product::where('category', 'LIKE', "%$product_services_category%")->offset($offset)->limit($limit)->get();

        // creating response
        $response = HelperFunctions::createResponse($products);
        $status = 200;
        return Response::json($response, $status);
    }

    public function storeBundleProduct(Request $request)
    {
        if ($request->input('base_product_order_number')) {
            $bundle_product = new BundleProduct;
            $bundle_product->base_product_order_number = $request->input('base_product_order_number');
            $bundle_product->base_area = $request->input('base_area');
            $bundle_product->compatible_product_order_numbers = implode(",", $request->input('compatible_product_order_numbers'));
            $bundle_product->product_services_order_numbers = implode(",", $request->input('product_services_order_numbers'));
            $bundle_product->status = $request->input('status');
            $bundle_product->save();

            // creating response
            $response = HelperFunctions::createResponse(['id'=>$bundle_product->id]);
            $status = 201;
            return Response::json($response, $status);

        } else {
            // creating response
            $response = HelperFunctions::createResponse([], false, "Please provided base_product_order_number");
            $status = 400;
            return Response::json($response, $status);

        }
    }

    public function getBundleProducts(Request $request)
    {
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;

        $bundle = [];
        $bundle_products = BundleProduct::where('status', 1)->offset($offset)->limit($limit)->get();
        foreach ($bundle_products as $bundle_product) {
            $data = [];
            $base_product = Product::where('order_number', $bundle_product['base_product_order_number'])->offset($offset)->limit($limit)->get()->toArray();
            $data['base_product'] = $base_product[0];

            $compatible_products = Product::wherein('order_number', explode(",", $bundle_product['compatible_product_order_numbers']))->offset($offset)->limit($limit)->get()->toArray();
            $data['compatible_products'] = $compatible_products;

            $product_services = Product::wherein('order_number', explode(",", $bundle_product['product_services_order_numbers']))->offset($offset)->limit($limit)->get()->toArray();
            $data['product_services'] = $product_services;

            $bundle[] = $data;
        }

        // creating response
        $response = HelperFunctions::createResponse($bundle);
        $status = 200;
        return Response::json($response, $status);

    }
}
