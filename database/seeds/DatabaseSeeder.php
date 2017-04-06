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
        User::create(["name"=>"Admin", "email"=>"admin@localhost.com", "password"=>bcrypt("secret")]);
        User::create(["name"=>"test","email"=>"test@localhost.com","password"=>bcrypt("toto")]);
        // $this->call(UsersTableSeeder::class);
    }
}
