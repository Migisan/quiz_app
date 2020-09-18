<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->timestamps();
            $table->id();
            $table->string('title');
            $table->text('question');
            $table->text('correct');
            $table->text('incorrect1');
            $table->text('incorrect2');
            $table->text('incorrect3');
            $table->text('explanation');
            $table->string('img_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
}
