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
        Schema::create('classnames', function (Blueprint $table) {
            $table->id();
            $table->string('connect')->nullable();
            
            $table->string('classname');
            $table->string('section');
            $table->string('ref_no1')->nullable();
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
        Schema::dropIfExists('classnames');
    }
};
