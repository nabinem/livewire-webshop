<?php

namespace App\Models;

use Money\Money;
use Money\Currency;
use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public $casts = [
        'amount_shipping' => MoneyCast::class,
        'amount_tax' => MoneyCast::class,
        'amount_discount' => MoneyCast::class,
        'amount_subtotal' => MoneyCast::class,
        'amount_total' => MoneyCast::class,
        'billing_address' => 'collection',
        'shipping_address' => 'collection'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
