<?php

use Illuminate\Database\Seeder;

class QuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert(
			[
				[
					'id'    => 1,
					'title' => 'Mathematics test simple',
					'image' => '8481math.jpeg'
				]
			]
        );
    }
}
