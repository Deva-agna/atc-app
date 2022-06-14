<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengujiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengujians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->date('theory_twr')->nullable();
            $table->date('renewed_unit_theory_twr')->nullable();
            $table->string('examiner_theory_twr')->nullable();
            $table->string('score_theory_twr')->nullable();
            $table->date('practical_twr')->nullable();
            $table->date('renewed_unit_practical_twr')->nullable();
            $table->string('examiner_practical_twr')->nullable();
            $table->string('score_practical_twr')->nullable();
            $table->date('theory_app')->nullable();
            $table->date('renewed_unit_theory_app')->nullable();
            $table->string('examiner_theory_app')->nullable();
            $table->string('score_theory_app')->nullable();
            $table->date('practical_app')->nullable();
            $table->date('renewed_unit_practical_app')->nullable();
            $table->string('examiner_practical_app')->nullable();
            $table->string('score_practical_app')->nullable();
            $table->string('signature_and_stamp')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('pengujians');
    }
}
