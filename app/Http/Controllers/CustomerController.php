<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function store(){

        $res= Http::withBasicAuth('admin','Q3PTIJlgkNSfrSg3GqxOxakxSlZAQZTCKQf8E0N8')->get('https://trainee2sw5.zepcomtesting3.com/api/articles',);
        foreach ($res['data'] as $products) {
            $product = new  Product();
            $product->id=$products['id'];
            $product->name =$products['name'];
            $product->price=$products['mainDetsail']['purchasePrice'];
            $product->item_number=$products['mainDetail']['number'];
            $product->save();
        }
    }
}
