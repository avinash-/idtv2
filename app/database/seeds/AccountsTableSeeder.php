<?php

class AccountsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		DB::table('accounts')->insert([
                'id'   => '1',
                'manager_id'  => '2',
                'account_name' => 'DuPont Extranet',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
       DB::table('accounts')->insert([
                'id'   => '2',
                'manager_id'  => '2',
                'account_name' => 'DuPont Nextgen',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
      DB::table('accounts')->insert([
                'id'   => '3',
                'manager_id'  => '2',
                'account_name' => 'Panasonic Console',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
      DB::table('accounts')->insert([
                'id'   => '4',
                'manager_id'  => '2',
                'account_name' => 'Panasonic Batch',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
      DB::table('accounts')->insert([
                'id'   => '5',
                'manager_id'  => '2',
                'account_name' => 'IOL Console',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
      DB::table('accounts')->insert([
                'id'   => '6',
                'manager_id'  => '2',
                'account_name' => 'IOL Batch',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
      DB::table('accounts')->insert([
                'id'   => '7',
                'manager_id'  => '2',
                'account_name' => 'NYK Console',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
      DB::table('accounts')->insert([
                'id'   => '8',
                'manager_id'  => '1',
                'account_name' => 'NAvya',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);

      DB::table('accounts')->insert([
                'id'   => '9',
                'manager_id'  => '1',
                'account_name' => 'avinash',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);


        $this->command->info('Accounts table seeded!');
	}

}
