<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Livewire\StoreFront::class)->name('home');
Route::get('/product/{productId}', \App\Livewire\Product::class)->name('product');
Route::get('/cart', \App\Livewire\Cart::class)->name('cart');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/checkout-status', \App\Livewire\CheckoutStatus::class)->name('checkout-status');
    Route::get('/order/{orderId}', \App\Livewire\ViewOrder::class)->name('view-order');
    Route::get('/my-orders', \App\Livewire\MyOrders::class)->name('my-orders');
});

Route::get('/mail-preview', function(){
    // $order = \App\Models\Order::first();
    // return new \App\Mail\OrderConfirmation($order); 

    return new \App\Mail\AbandonedCartReminder(\App\Models\Cart::whereHas('user')->first());
    
});
Route::get('/post', \App\Livewire\Post::class)->name('post');
Route::get('/modal', fn() => view('examples.modal'))->name('modal');

Route::group([
    'prefix' => 'multistep-form',
    'as' => 'multistep-form.',
], function () {
    Route::get('register-student', \App\Livewire\MultistepForm\RegisterStudent::class)
        ->name('register-student');
    Route::view('register-student-success', 'examples.multistep-form.register-student-success')
        ->name('register-student-success');//
    Route::get('create-user', \App\Livewire\MultistepForm\CreateUser::class)
        ->name('create-user');
});

Route::resource('orders', App\Http\Controllers\OrderController::class);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
