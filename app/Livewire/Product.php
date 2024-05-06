<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Product as ProductModel;

class Product extends Component
{
    public $productId;

    public function mount()
    {
        
    }

    #[Computed]
    public function product()
    {
        return ProductModel::findOrFail($this->productId);
    }

    public function render()
    {
        return view('livewire.product');
    }
}
