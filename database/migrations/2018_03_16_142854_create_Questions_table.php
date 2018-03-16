<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('questions'))
        {
            Schema::create('questions', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('title');
                $table->string('answer');
                $table->string('a');
                $table->string('b');
                $table->string('g')->nullable();
                $table->string('d')->nullable();
                $table->string('e')->nullable();
                $table->integer('test_id');
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
        Schema::dropIfExists('questions');
    }
}
