<?php

namespace App\Livewire\Example;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
class OrderProduct extends Component
{
    public $orderProducts = [
        ['product_id' => '', 'quantity' => 1]
    ];
    public $customer_name;
    public $customer_email;

    protected $rules = [
        'customer_name' => 'required',
        'customer_email' => 'required|email'
    ];
   
    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }

    public function save()
    {
        $this->validate();

        $order = Order::create([
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
        ]);


        foreach ($this->orderProducts as $product) {
            if (!empty($product['product_id'])){
                $order->products()->attach($product['product_id'],
                    ['quantity' => $product['quantity']
                ]);
            }
        }

        session()->flash('success', 'Order saved successfully');
        
        $this->reset();

    }

    public function testRedirect(){
        return redirect('/');
    }
    
    public function render()
    {
        return view('livewire.example.order-product', [
            'allProducts' => Product::all(),
        ]);
    }
}
