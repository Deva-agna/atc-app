<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('license_number_one')->nullable();
            $table->string('effected_since_one')->nullable();
            $table->string('license_number_two')->nullable();
            $table->string('effected_since_two')->nullable();
            $table->string('birth');
            $table->string('nationality')->nullable();
            $table->string('sex');
            $table->string('address');
            $table->string('rating_one')->nullable();
            $table->string('rating_two')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('biodatas');
    }
}
