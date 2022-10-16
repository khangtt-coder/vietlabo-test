<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::factory()->create([
             'user_name' => 'khangtran86',
             'email' => 'trantrungkhang86@gmail.com',
             'fullname' => 'Tran Trung Khang',
             'avatar' => '/avatar/1665936125.jpeg',
             'phone_number' => '0373525647',
             'about_me' => ' I graduated from Bach Khoa university with a major in computer science. Now I have almost five years of experience as a web developer, coded mostly in PHP, Javascript and Go. I`ve contributed  various projects using different frameworks and content management systems such as Laravel, Yii, Wordpress and so on. In my years in this industry, I`ve honed my analytical thinking and problem solving skills, and I enjoy seeking out innovative solutions to everyday problems. Now I`m  so excited about this opportunity with your company.',
        ]);

        User::factory()->create([
            'user_name' => 'wsgroup',
            'password' => Hash::make("proudtobehere")
        ]);
    }
}
