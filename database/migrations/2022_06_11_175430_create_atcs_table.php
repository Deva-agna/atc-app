<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atcs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('tgl');
            $table->string('morning_ctr')->nullable();
            $table->string('morning_ass')->nullable();
            $table->string('morning_rest')->nullable();
            $table->string('afternoon_ctr')->nullable();
            $table->string('afternoon_ass')->nullable();
            $table->string('afternoon_rest')->nullable();
            $table->string('night_ctr')->nullable();
            $table->string('night_ass')->nullable();
            $table->string('night_rest')->nullable();
            $table->string('unit')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('atcs');
    }
}
