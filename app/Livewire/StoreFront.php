<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Product;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class StoreFront extends Component
{
    use WithPagination;

    #[Url]
    public $keywords;

    #[Computed]
    public function products()
    {
        return Product::query()
            ->when($this->keywords, fn($query) => $query->where('name', 'like', '%'.$this->keywords.'%'))
            ->paginate(2);
    }


    public function render()
    {
        return view('livewire.store-front');
    }
}
