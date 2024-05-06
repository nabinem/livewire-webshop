<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Product;

class StoreFront extends Component
{
    #[Computed]
    public function products()
    {
        return Product::query()->get();
    }


    public function render()
    {
        return view('livewire.store-front');
    }
}
