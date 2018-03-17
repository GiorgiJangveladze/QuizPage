<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          User::create(
	       [
	       	'name'=>'admin',
	      	'email'=>'admin@gmail.com',
	      	'password'=>'$2y$10$7L7HabJw9lKD3vNB5.u.ZecHWTiahH1Gy6N4h7zcW0U5mffHU30c2',
	      	'isAdmin'=>true
	       ]);
    }
}
