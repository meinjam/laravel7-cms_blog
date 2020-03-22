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
        App\User::create([
            'name' => 'Injamamul Haque',
            'email' => 'injam.bd.jsr@gmail.com',
            'password' => Hash::make('injam2015jsr'),
        ]);
    }
}
