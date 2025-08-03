<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Product;

class Movements extends Model
{
    public const TYPES = [
        'Entry' => 1,
        'Exit' => 2,
    ];

    protected $fillable = ['type', 'description', 'person_id', 'product_id'];

    protected $casts = [
        'type' => 'integer',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getTypeNameAttribute()
    {
        return array_search($this->type, self::TYPES) ?? 'Unknown';
    }
}
