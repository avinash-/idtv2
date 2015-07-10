<?php

class ManagerTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');

		DB::table('managers')->insert([
                'id'   => '1',
                'manager'      => 'Asif',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
        DB::table('managers')->insert([
                'id'   => '2',
                'manager'      => 'Ravi K Vinnakota',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
 
       DB::table('managers')->insert([
                'id'   => '3',
                'manager'      => 'Pallove',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);

        $this->command->info('Manager table seeded!');
	}

}
