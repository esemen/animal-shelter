<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('animal_id')->constrained();
            $table->foreignId('application_status_id')->constrained()->restrictOnDelete();
            $table->text('reason')->nullable();
            $table->string('applied_before')->nullable();
            $table->json('property')->nullable();
            $table->json('garden')->nullable();
            $table->json('occupants')->nullable();
            $table->json('occupation')->nullable();
            $table->json('experience')->nullable();
            $table->json('care')->nullable();
            $table->json('plans')->nullable();
            $table->json('uploads')->nullable();
            $table->text('additional_info')->nullable();
            $table->string('found_through')->nullable();
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('legacy_id')->nullable()->unique();
            $table->unique(['user_id','animal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
