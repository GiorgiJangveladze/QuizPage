<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizHasCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('quiz_has_category'))
        {
            Schema::create('quiz_has_category', function (Blueprint $table) {
                $table->integer('category_id')->unsigned()->nullable(); 
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->integer('quiz_id')->unsigned()->nullable();
                $table->foreign('quiz_id')->references('id')->on('quiz')->onDelete('cascade');
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
         Schema::dropIfExists('quiz_has_category');
    }
}
