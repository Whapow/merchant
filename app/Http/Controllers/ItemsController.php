<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests\Items\CreateItemRequest;
use App\Http\Requests\Items\UpdateItemRequest;

class ItemsController extends Controller
{
    //
    public function index(){
        return view('items.index')->with('items', Item::all());
    }

    public function create(){
        return view('items.form');
    }

    public function store(CreateItemRequest $request){

        $image = $request->image->store('items');
        Item::create([
            'name' => $request->name,
            'value' => $request->value,
            'description' => $request->description,
            'image' => $image
        ]);
        session()->flash('success', 'Item created successfully.');
        
        return redirect(route('items.index'));
    }
    
    public function edit(Item $item){
        return view('items.form')->with('item', $item);
    }
    
    public function update(UpdateItemRequest $request, Item $item){
        $this->validate(request(), [
            'name' => 'required|unique:items'
        ]);
        $item->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Item updated successfully.');

        return redirect("/items/{$item->id}")->with('item', $item);
    }
    
    public function destroy($id){
        $item = Item::withTrashed()->where('id', $id)->firstOrFail();
        if ($item->trashed()){
            $item->forceDelete();
        } else {
            $item->delete();
        }
        session()->flash('success', 'Item deleted successfully.');

        return redirect(route('items.index'));
    }

    public function trash(){
        $trashed = Item::onlyTrashed()->get();
        return view('items.index')->with('items', $trashed);
    }

    public function restore($id){
        $item = Item::withTrashed()->where('id', $id)->firstOrFail();

        $item->restore();
        session()->flash('success', 'Item restored successfully.');

        return redirect(route('items.index'));
    }

}
