<?php

use Illuminate\Database\Seeder;

class CategoryTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		DB::table('category_test')->insert(
			[
				[
					'category_id'    => 1,
					'test_id'   => 1 
				],
			]
        );
    }
}
