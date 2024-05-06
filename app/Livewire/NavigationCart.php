<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

class NavigationCart extends Component
{
    public $isActive = false;

    public function mount()
    {
        $this->isActive = request()->routeIs('cart');
    }

    #[Computed]
    #[On('productAddedToCart')]
    #[On('productRemovedFromCart')]
    public function count()
    {
        return CartFactory::make()->items()->sum('quantity');
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
