<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Product;

class ProductForm extends Form
{
    public ?Product $product;

    #[Validate('required|min:2')]
    public $name;

    #[Validate('required|min:2')]
    public $description;

    #[Validate('required|numeric')]
    public $price;

    public function setProduct(Product $product)
    {
        $this->product = $product;

        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price->getAmount();
    }

    public function save()
    {
        $this->validate();

        $product = !empty($this->product) ? $this->product : new Product;

        $product->fill($this->only([
            'name',
            'description',
            'price'
        ]));

        $product->save();

    }

}
