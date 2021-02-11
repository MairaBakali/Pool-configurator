<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

}
