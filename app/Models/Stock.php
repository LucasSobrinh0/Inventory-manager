<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public const STATUS_IN_STOCK = 0;
    public const STATUS_IN_USE = 1;
    public const STATUS_RESERVED = 2;

    protected $fillable = ['status'];

    protected $casts = [
        'status' => 'integer',
    ];

    public function isInUse(): bool
    {
        return $this->status === self::STATUS_IN_USE;
    }

    public function isReserved(): bool
    {
        return $this->status === self::STATUS_RESERVED;
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            self::STATUS_IN_STOCK => 'Em estoque',
            self::STATUS_IN_USE => 'Em uso',
            self::STATUS_RESERVED => 'Reservado',
            default => 'Desconhecido',
        };
    }
}
