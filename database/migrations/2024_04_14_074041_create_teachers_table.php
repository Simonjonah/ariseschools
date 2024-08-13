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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            
            $table->string('user_id')->nullable();
            $table->string('school_id')->nullable();
            $table->string('fname');
            $table->string('centernumber')->nullable();

            $table->string('connect');
            $table->string('schoolname')->nullable();
            $table->string('schooltype')->nullable();
            $table->string('promotion')->nullable();
            $table->text('logo')->nullable();
            $table->string('surname');
            $table->string('address');
            $table->string('transferteacher')->nullable();
            $table->string('assign1')->nullable();
            
            $table->string('motor')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('images')->nullable();
            $table->string('status')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('phone')->nullable();
            $table->string('term')->nullable();
            $table->string('lga')->nullable();
            $table->string('section')->nullable();
            $table->string('alms')->nullable();
            $table->string('classname')->nullable();
            $table->text('signature')->nullable();
            $table->string('slug')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('teachers');
    }
};
