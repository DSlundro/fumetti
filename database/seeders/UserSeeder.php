<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 6; $i++) { 
            $user = new User();
            $user->name = 'Test'.$i;
            $user->email = 'test'.$i.'@test.it';
            $user->email_verified_at = now();
            $user->account_type = 'email';
            $user->username = 'test'.$i;
            $user->password = Hash::make('password');
            $user->remember_token = Str::random(10);
            $user->save();
        };
    }
}
