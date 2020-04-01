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
        $user = App\User::create([
            'name' => 'Injamamul Haque',
            'email' => 'injam.bd.jsr@gmail.com',
            'password' => Hash::make('injam2015jsr'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'img/avatar/admin.jpg',
            'about' => 'I am Injamamul Haque. I am a self taught, full stack developer.
                        
                        I love coding. I love computers. I love everything about them. I spend seven to nine hours a day in front of my computer as I write code, debugging and coding practices. I also love learning about all the latest technologies.
                        
                        I spend the rest of the day with my family and practice religion. By the way, I am a practising Muslim and I feel proud of it.',
            'facebook' => 'https://www.facebook.com/meinjam/',
            'linkedin' =>'https://www.linkedin.com/in/meinjam/',
            'instagram' =>'https://www.instagram.com/meinjam/',
        ]);
    }
}
