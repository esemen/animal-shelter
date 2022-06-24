<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('long_name');
            $table->string('slug');
            $table->string('prefix')->nullable();
            $table->string('tag')->nullable();
            $table->boolean('routable')->default(true);
            $table->json('controller')->nullable();
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
        Schema::dropIfExists('page_types');
    }
}
