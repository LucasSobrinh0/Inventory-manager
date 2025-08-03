<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Product;

class Movements extends Model
{
    protected $fillable = ['type', 'description', 'person_id', 'product_id'];

    public const TYPE_DELIVERY = 1;
    public const TYPE_RETURN = 0;

    public const TYPES = [
        'Entrega' => self::TYPE_DELIVERY,
        'Devolução' => self::TYPE_RETURN,
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getTypeLabelAttribute(): string
    {
        return match ($this->type) {
            self::TYPE_DELIVERY => 'Entrega',
            self::TYPE_RETURN => 'Devolução',
            default => 'Desconhecido',
        };
    }
}

