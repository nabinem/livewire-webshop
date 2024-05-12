<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('stripe_checkout_session_id')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->unsignedInteger('amount_shipping')->default(0);
            $table->unsignedInteger('amount_discount')->default(0);
            $table->unsignedInteger('amount_tax')->default(0);
            $table->unsignedInteger('amount_subtotal')->default(0);
            $table->unsignedInteger('amount_total')->default(0);
            $table->json('billing_address')->nullable();
            $table->json('shipping_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
