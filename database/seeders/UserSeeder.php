<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plataforma = new User();
        $plataforma->name= "Victor Manuel Vargas Chavez";
        $plataforma->email="zedequis@gmail.com";
        $plataforma->password = Hash::make("zedonozed");
        $plataforma->save();
    }
}
