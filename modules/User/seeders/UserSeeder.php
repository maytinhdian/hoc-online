<?php

namespace Modules\User\seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Modules\User\src\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // $user = new User();
        // $user->name='Le Thanh Nha';
        // $user->email='tnhalk@maytinhdian.com';
        // $user->password=Hash::make('123456');
        // $user->group_id=1;
        // $user->save();
        $faker = Factory::create();
        for ($index = 0; $index <= 30; $index++) {
            $user = new User();
            $user->name=$faker->name;
            $user->email=$faker->email;
            $user->password=Hash::make('123456');
            $user->group_id=1;
            $user->save();
        }

    }
}
