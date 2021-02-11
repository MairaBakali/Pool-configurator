<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Redirect,Response;
use Illuminate\Http\Request;
use App\Models\Test;
use GuzzleHttp;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class JsonController extends Controller
{
    public function show()
    {
        $client = new GuzzleHttp\Client();

        $res=$client->request('GET', 'http://192.168.33.1/api/articles', ['headers'=>
       ['Authorization'=>'Basic dXNlcjpmd0IxUlhkcW94Z2lnMTU3RVNFeVRodmhlNUNETFJ3ckEwZklTMEN0']]);
        $products= json_decode((string) $res->getBody(), true);
        return view('welcome', ['products'=> $products]);
    }
    public function store(){

        $res= Http::withBasicAuth('admin','Q3PTIJlgkNSfrSg3GqxOxakxSlZAQZTCKQf8E0N8')->get('https://trainee2sw5.zepcomtesting3.com/api/articles',);
        $products= json_decode((string) $res->getBody(), true);
        foreach ($products['data'] as $products) {
            $test = new  Test();
            $test->name =json_encode($products['name']);
            $test->price=$products['mainDetail']['purchasePrice'];
            $test->save();
        }
    }
}
