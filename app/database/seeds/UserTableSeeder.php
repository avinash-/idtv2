<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

        Eloquent::unguard();

		//$this->call('UserTableSeeder');

		$vader = DB::table('users')->insert([
                'username'   => 'avinash',
                'email'      => 'avinash@avinash.com',
                'password'   => Hash::make('avinash'),
                'first_name' => 'Avinash',
                'last_name'  => 'Tanniru',
                'role'  => 'admin',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
        DB::table('users')->insert([
                'username'   => 'tinku',
                'email'      => 'tinku@avinash.com',
                'password'   => Hash::make('avinash'),
                'first_name' => 'Luke',
                'role'       => 'admin',
                'last_name'  => 'Skywalker',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
        DB::table('users')->insert([
                'username'   => 'manager',
                'email'      => 'manager@avinash.com',
                'password'   => Hash::make('avinash'),
                'first_name' => 'Yoda',
                'last_name'  => 'Unknown',
                'role'       => 'manager',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);

         $this->command->info('User table seeded!');
	}

}
