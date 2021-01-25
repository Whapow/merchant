<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use App\Http\Requests\Shops\CreateShopRequest;
use App\Http\Requests\Shops\UpdateShopRequest;

class ShopsController extends Controller
{
    //
    public function index(){
        return view('shops.index')->with('shops', Shop::all());
    }

    public function create(){
        return view('shops.edit');
    }

    public function store(CreateShopRequest $request){
        // return view('shops.index');
        Shop::create([
            'name' => $request->name,
            'gold' => ($request->gold || 0)
        ]);
        session()->flash('success', 'Shop created successfully.');
        
        return redirect('/shops');
        
    }
    
    public function show(Shop $shop){
        return view('shops.show')->with('shop', $shop);
    }
    
    public function edit(Shop $shop){
        return view('shops.edit')->with('shop', $shop);
    }
    
    public function update(UpdateShopRequest $request, Shop $shop){
        $this->validate(request(), [
            'name' => 'required|unique:shops'
        ]);
        $shop->update([
            'name' => $request->name,
            'gold' => ($request->gold || 0)
        ]);

        session()->flash('success', 'Shop updated successfully.');

        return redirect("/shops/{$shop->id}")->with('shop', $shop);
    }
    
    public function destroy($id){
        $shop = Shop::withTrashed()->where('id', $id)->firstOrFail();
        if ($shop->trashed()){
            $shop->forceDelete();
        } else {
            $shop->delete();
        }
        session()->flash('success', 'Shop deleted successfully.');

        return redirect(route('shops.index'));
    }

    public function trash(){
        $trashed = Shop::onlyTrashed()->get();
        return view('shops.index')->with('shops', $trashed);
    }

    public function restore($id){
        $shop = Shop::withTrashed()->where('id', $id)->firstOrFail();

        $shop->restore();
        session()->flash('success', 'Shop restored successfully.');

        return redirect(route('shops.index'));
    }
}
