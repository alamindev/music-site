<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExercisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->string('exercise_name');
            $table->string('code');
            $table->string('type');
            $table->bigInteger('horn_id')->unsigned()->index()->nullable();
            $table->foreign('horn_id')->references('id')->on('horns')->onDelete('cascade');
            $table->bigInteger('book_id')->unsigned()->index()->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
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
        Schema::dropIfExists('exercises');
    }
}
