<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
                 'user_name' => 'admin',
                 'email' => 'admin@yahoo.com',
                 'role'=>'Master',
                 'password' => bcrypt('1234qwer'),
        ]);
         $this->command->info('User table seeded!');
    }
}

