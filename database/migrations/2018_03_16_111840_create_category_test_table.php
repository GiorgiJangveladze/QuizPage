<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('category_test'))
        {
            Schema::create('category_test', function(Blueprint $table)
            {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
             
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');

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
        Schema::dropIfExists('category_test');
    }
}
