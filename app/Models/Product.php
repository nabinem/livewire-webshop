<?php

namespace App\Models;

use App\Casts\MoneyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $casts = [
        'price' => MoneyCast::class
    ];

    public function variants() : HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function image() : HasOne
    {
        return $this->hasOne(Image::class)->ofMany('featured', 'max');
    }

    public function images() : HasMany
    {
        return $this->hasMany(Image::class);
    }
    
}
