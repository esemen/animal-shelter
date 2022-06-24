<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_checks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('application_id')->unique()->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('check_date')->nullable();
            $table->text('notes')->nullable();
            $table->integer('opinion')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('cancelled')->default(false);
            $table->text('cancel_reason')->nullable();
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
        Schema::dropIfExists('home_checks');
    }
}
