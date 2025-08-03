<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;


class Product extends Model
{
    protected $fillable = ['name', 'serial', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
