<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $table = 'prodcuts';
    protected $fillable = ['name','price','description','image'];
}
