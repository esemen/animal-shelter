<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFosterersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fosterers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained();
            $table->json('fostering')->nullable();
            $table->json('property')->nullable();
            $table->json('garden')->nullable();
            $table->json('occupants')->nullable();
            $table->json('occupation')->nullable();
            $table->json('experience')->nullable();
            $table->json('care')->nullable();
            $table->json('plans')->nullable();
            $table->json('uploads')->nullable();
            $table->text('additional_info')->nullable();
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
        Schema::dropIfExists('fosterers');
    }
}
