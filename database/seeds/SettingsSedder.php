<?php

use Illuminate\Database\Seeder;

class SettingsSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'Blog Website',
            'contact_number' => '+880 1685 970744',
            'contact_email' => 'injam.bd.jsr@gmail.com',
            'address' => 'Jessore, Khulna, Bangladesh.',
        ]);
    }
}
