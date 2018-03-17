<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('categories')->insert(
			[
				[
					'id' =>1,
					'name' => 'Mathematics'
				],
				[
					'id' => 2,
					'name'=>'Fizik'
				],
				[
					'id' => 3,
					'name'=>'English'
				]
				,
				[
					'id' => 4,
					'name'=>'Biology'
				]
				,[
					'id' => 5,
					'name'=>'something else...'
				]
			]
        );
    }
}
