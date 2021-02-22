<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Product;

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
        return Product::where('category', 'LIKE', "%$base_products_category%")->offset($offset)->limit($limit)->get();

    }

    public function getCompatibleProduct(Request $request)
    {
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;
        return Product::whereIn('order_number', $request->input('order_number'))->offset($offset)->limit($limit)->get();
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
        return Product::where('category', 'LIKE', "%$product_services_category%")->offset($offset)->limit($limit)->get();
    }
}
