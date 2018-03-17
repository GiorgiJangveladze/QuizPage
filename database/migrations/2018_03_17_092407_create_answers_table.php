<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('answers'))
        {
            Schema::create('answers', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('name');
                $table->string('question_count');
                $table->string('right_answers');
                $table->string('quiz_title');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
