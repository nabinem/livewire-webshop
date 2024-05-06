<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Factories\CartFactory;

class Cart extends Component
{
    #[Computed]
    public function cart()
    {
        return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
    }

    #[Computed]
    public function items()
    {
        return $this->cart->items()->with('variant', 'product')->get();
    }

    public function delete($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();

        $this->dispatch('productRemovedFromCart');
    }

    public function increment($itemId)
    {
        $this->cart->items()->find($itemId)?->increment('quantity');

        $this->dispatch('productAddedToCart');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);
        if ($item->quantity > 1) {
            $item->decrement('quantity');
            $this->dispatch('productRemovedFromCart');
        }
    }


    public function render()
    {
        return view('livewire.cart');
    }
}
