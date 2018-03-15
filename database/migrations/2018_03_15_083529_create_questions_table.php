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
            Schema::create('questions', function (Blueprint $table) {
                $table->increments('id');           
                $table->integer('quiz_id')->unsigned();

                $table->string('title',100);
                $table->string('a',100);
                $table->string('b',100);
                $table->string('g',100);                
                $table->string('d',100)->nullable();
                $table->string('e',100)->nullable();
                $table->string('answer',100);

                $table->unique('quiz_id');
                $table->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade');
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
