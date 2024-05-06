<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Product as ProductModel;
use Laravel\Jetstream\InteractsWithBanner;

class Product extends Component
{
    use InteractsWithBanner;

    public $productId;

    public $variant;

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
        
    }

    #[Computed]
    public function product()
    {
        return ProductModel::findOrFail($this->productId);
    }

    public function rules()
    {
        return [
            'variant' => ['required', 'exists:App\Models\ProductVariant,id']
        ];
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(variantId: $this->variant);

        $this->banner('Your product has been added to your Cart.');

        $this->dispatch('productAddedToCart');
    }

    public function render()
    {
        return view('livewire.product');
    }
}
