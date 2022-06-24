<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('animal_type_id')->constrained()->restrictOnDelete();
            $table->foreignId('animal_status_id')->constrained()->restrictOnDelete();
            $table->foreignId('location_id')->nullable()->constrained('users')->restrictOnDelete();
            $table->foreignId('locked_by')->nullable()->constrained('users')->restrictOnDelete();
            $table->datetime('locked_at')->nullable();
            $table->string('name');
            $table->string('sex');
            $table->string('breed')->nullable()->index();
            $table->date('dob')->nullable();
            $table->string('colour')->nullable();
            $table->string('markings')->nullable();
            $table->string('passport')->nullable();
            $table->longText('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('booking_info')->nullable();
            $table->longText('medical_note')->nullable();
            $table->longText('other_note')->nullable();
            $table->float('weight',6,2,true)->nullable();
            $table->string('microchip1')->nullable();
            $table->string('microchip2')->nullable();
            $table->string('chip_company')->nullable();
            $table->boolean('update_chip')->nullable();
            $table->json('images')->nullable();
            $table->date('incoming')->nullable();
            $table->date('wormed')->nullable();
            $table->date('fleaed')->nullable();
            $table->date('kennel_cough')->nullable();
            $table->date('neutered')->nullable();
            $table->date('neuter_due')->nullable();
            $table->date('first_jab')->nullable();
            $table->date('second_jab')->nullable();
            $table->date('first_rabies')->nullable();
            $table->date('second_rabies')->nullable();
            $table->date('booster_due')->nullable();
            $table->date('stitches_out')->nullable();
            $table->json('attributes')->nullable();
            $table->date('located_date')->nullable();
            $table->date('assessment_date')->nullable();
            $table->longText('assessment_note')->nullable();
            $table->unsignedBigInteger('legacy_id')->nullable()->unique();
//            $table->foreignId('location_email')->nullable()->constrained('users')->restrictOnDelete();
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
        Schema::dropIfExists('animals');
    }
}
