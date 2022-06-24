<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vetters', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained();
            $table->string('travel')->nullable();
            $table->string('home_check')->nullable();
            $table->string('transport')->nullable();
            $table->string('own_dog')->nullable();
            $table->text('other_rescues')->nullable();
            $table->text('dogs_adopted')->nullable();
            $table->text('additional_info')->nullable();
            $table->json('confirmations')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vetters');
    }
}
