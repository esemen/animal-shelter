<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index();
            $table->string('email')->nullable()->unique();
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('house_no')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('town')->nullable();
            $table->string('county')->nullable();
            $table->string('full_address')->nullable();
            $table->float('latitude', 9, 6)->nullable();
            $table->float('longitude', 9, 6)->nullable();
            $table->string('postcode')->nullable();
            $table->string('landline')->nullable();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->string('search_key');
            $table->unsignedBigInteger('legacy_id')->nullable()->unique();
            $table->rememberToken();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
