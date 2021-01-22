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

    public function new(){
        return view('shops.new');
    }

    public function create(){
        // return view('shops.index');
        $this->validate(request(), [
            'name' => 'required|unique:shops'
        ]);
        $data = request()->all();
        $shop = new Shop();
        $shop->name = $data['name'];
        $shop->gold = 0;

        $shop->save();
        session()->flash('success', 'Shop created successfully.');
        
        return redirect('/shops');
        
    }
    
    public function show(Shop $shop){
        return view('shops.show')->with('shop', $shop);
    }
    
    public function edit(Shop $shop){
        return view('shops.edit')->with('shop', $shop);
    }
    
    public function update(Shop $shop){
        $this->validate(request(), [
            'name' => 'required|unique:shops'
        ]);
        $data = request()->all();
        $shop->name = $data['name'];
        $shop->gold = 0;

        $shop->save();
        session()->flash('success', 'Shop updated successfully.');

        return redirect("/shops/{$shop->id}")->with('shop', $shop);
    }
    
    public function delete(Shop $shop){
        $shop->delete();
        session()->flash('success', 'Shop deleted successfully.');

        return redirect("/shops");
    }
}
