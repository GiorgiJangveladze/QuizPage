<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('questions')->insert(
			[
				[
					'id'    => 1,
					'title' => '5*5 = ?',
					'answer' => '2',
					'a' => 79,
					'b' =>25,
					'g' =>40,
					'd' =>33, 
					'e' =>null, 
					'test_id' => 1
				],
				[
					'id'    => 2,
					'title' => '2+2 = ?',
					'answer' => '1',
					'a' => 4,
					'b' =>7,
					'g' =>5,
					'd' =>1, 
					'e' =>null,
					'test_id' => 1
				],
				[
					'id'    => 3,
					'title' => '7+7 = ?',
					'answer' => '4',
					'a' => 4,
					'b' =>7,
					'g' =>5,
					'd' =>49, 
					'e' =>28,
					'test_id' => 1
				],

			]
        );
    }
}
