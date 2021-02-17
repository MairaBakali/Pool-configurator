<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfiguratorRequest;
use App\Models\Config;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.configurator');
    }
    
    public function store(StoreConfiguratorRequest $request)
    {
        // The incoming request is valid because we use Form Request Validation 
        // Retrieve the validated input data...
        $validated = $request->validated();
        Config::truncate();
        // Saving validated input data in Database
        $config = Config::create($validated);
        return back()->with('success_message', 'Your configuration saved successfully!');
    }
}
