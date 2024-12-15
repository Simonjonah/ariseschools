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
        Schema::create('scrachcards', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->string('type')->nullable();
            $table->string('pin')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('scrachcards');
    }
};
