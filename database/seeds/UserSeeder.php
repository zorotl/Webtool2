<?php
/**
 * Date: 14.05.2022
 * Time: 17:01
 */

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run() {

        $user = new User([
            'name' => 'Martin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('test1234'),
            'remember_token' => Str::random(10),
        ]);
        $user->save();

    }
}
