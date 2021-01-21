<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{
    //
    public function index(){
        return view('shops.index')->with('shops', Shop::all());
    }

    public function show($shopId){
        return view('shops.show')->with('shop', Shop::find($shopId));
    }
}
