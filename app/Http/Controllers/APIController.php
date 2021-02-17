<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Product;

class APIController extends Controller
{
    public function getMainProducts(Request $request)
    {
        // Get data from Config table
        $config = Config::first();
        // Removing slash from start and end
        $categoryPathname = rtrim(ltrim(strtolower($config->category_url_1), '/'), '/');
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;

        return Product::where('property_group', 'LIKE', "%$categoryPathname%")->offset($offset)->limit($limit)->get();

    }

    public function getProductAccessories(Request $request)
    {
        // Get data from Config table
        $config = Config::first();
        // Removing slash from start and end
        $categoryPathname = rtrim(ltrim(strtolower($config->category_url_2), '/'), '/');
        // Convert in array
        $categoryArray = explode("/", $categoryPathname);
        $categoryPathname = $categoryArray[count($categoryArray)-1];
        // Set limit and offset
        $limit = $request->query('limit') ? $request->query('limit') : 10;
        $offset = $request->query('offset') ? $request->query('offset') : 0;

        return Product::where('category', 'LIKE', "%$categoryPathname%")->offset($offset)->limit($limit)->get();

    }

    public function getProductService(Request $request)
    {
        return "getProductService";
    }
}
