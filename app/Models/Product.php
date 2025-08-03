<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use App\Models\Stock;
use App\Models\Person;

class Product extends Model
{
    protected $fillable = ['name', 'serial', 'category_id', 'stock_id', 'person_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    private function updateStockStatus(Product $product, int $status)
    {
        $stock = $product->stock;
        if ($stock) {
            $stock->update(['status' => $status]);
        } else {
            $stock = Stock::create(['status' => $status]);
            $product->stock()->associate($stock);
            $product->save();
        }
    }

    public function setInStock($product)
    {
        $this->updateStockStatus($product, Stock::STATUS_IN_STOCK);
    }

    public function setInUse($product)
    {
        $this->updateStockStatus($product, Stock::STATUS_IN_USE);
    }

    public function setIsReserved($product)
    {
        $this->updateStockStatus($product, Stock::STATUS_RESERVED);
    }
}
