<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'gold'];

    public function inventories(){
        $this->morphMany(Inventory::class, 'owner');
    }

}
