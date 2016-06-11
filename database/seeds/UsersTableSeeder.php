<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{

		$user = \foobooks\User::firstOrCreate(['email' => 'jill@harvard.edu']);
		$user->name = 'Jill';
		$user->email = 'jill@harvard.edu';
		$user->password = \Hash::make('helloworld');
		$user->save();

		$user = \foobooks\User::firstOrCreate(['email' => 'jamal@harvard.edu']);
		$user->name = 'Jamal';
		$user->email = 'jamal@harvard.edu';
		$user->password = \Hash::make('helloworld');
		$user->save();
		
		$user = \foobooks\User::firstOrCreate(['email' => 'phatosas@yahoo']);
		$user->name = 'Osagie';
		$user->email = 'phatosas@yahoo.com';
		$user->password = \Hash::make('fatjoe');
		$user->save();

	}
}
