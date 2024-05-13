<?php

namespace App\Livewire\Example;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;
use App\Livewire\Forms\ProductForm;

class ProductModal extends ModalComponent
{
    public ProductForm $form; 

    public function mount(Product $product = null)
    {
        if ($product->exists){
            $this->form->setProduct($product);
        }
    }
 
    public function save()
    {
        $this->form->save();

        session()->flash('status', 'Product successfully saved.');

        $this->closeModal();
 
        return $this->redirectRoute('products');
    }
 
    public function render()
    {
        return view('livewire.example.product-form');
    }
}
