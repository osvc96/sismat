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
        DB::table('users')->insert([
            'name' => 'Anthony Rojas',
            'email' => 'anthony@matadero.com',
            'password' => bcrypt('1q2w'),
        ]);
    }
}
