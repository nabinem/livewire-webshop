<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $casts = [
        'billing_address' => 'collection',
        'shipping_address' => 'collection'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
