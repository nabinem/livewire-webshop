<?php

namespace App\Console\Commands;

use App\Models\Cart;
use Illuminate\Console\Command;

class RemoveInactiveSessionCarts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:remove-inactive-session-carts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $carts = Cart::withWhereDosnotHave('user')->whereDate('updated_at', '<', today()->subDay())->get();
        
        foreach ($carts as $cart){
            $cart->items()->delete();
            $cart->delete(); 
        }
    }
}
