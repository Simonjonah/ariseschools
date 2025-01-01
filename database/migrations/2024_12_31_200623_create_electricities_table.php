<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electricities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('request_id')->nullable();
            $table->string('serviceID')->nullable();
            $table->string('variation_code')->nullable();
            $table->string('billersCode')->nullable();
            $table->string('subscription_type')->nullable();
            $table->string('quantity')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('balance')->nullable();
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('product_name')->nullable();
            $table->string('unique_element')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('service_verification')->nullable();
            $table->string('channel')->nullable();
            $table->string('commission')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('type')->nullable();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('convinience_fee')->nullable();
            $table->string('platform')->nullable();
            $table->string('method')->nullable();
            $table->string('transactionID')->nullable();
            $table->string('response_description')->nullable();
            $table->string('requestId')->nullable();
            $table->string('timezone_type')->nullable();
            $table->string('timezone')->nullable();
            $table->string('ref_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electricities');
    }
};
