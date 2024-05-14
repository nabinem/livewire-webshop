<?php

namespace App\Livewire\Example;

use Livewire\Component;
use App\Models\Product;
use App\Models\Order;
use App\Models\Country;
use App\Models\City;
class OrderProduct extends Component
{
    public $orderProducts = [
        ['product_id' => '', 'quantity' => 1]
    ];
    public $customer_name;
    public $customer_email;
    public $customer_country;
    public $customer_city;
    public $countries;
    public $cities;

    protected $rules = [
        'customer_name' => 'required',
        'customer_email' => 'required|email',
        'customer_country' => 'required',
        'customer_city' => 'required'
    ];

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedCustomerCountry($value)
    {
        $this->cities = City::where('country_id', $value)->get();
        $this->customer_city = $this->cities->first()->id ?? null;
    }
   
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
            'customer_country' => $this->customer_country,
            'customer_city' => $this->customer_city,
        ]);


        foreach ($this->orderProducts as $product) {
            if (!empty($product['product_id'])){
                $order->products()->attach($product['product_id'],
                    ['quantity' => $product['quantity']
                ]);
            }
        }

        session()->flash('success', 'Order saved successfully');

        return redirect()->route('orders.create');
        
        $this->reset([
            'customer_name', 'customer_email', 'customer_country', 
            'customer_city', 'orderProducts'
        ]);

    }

    public function testRedirect(){
        return redirect('/');
    }
    
    public function render()
    {
        return view('livewire.example.order-product', [
            'allProducts' => Product::all()
        ]);
    }
}
