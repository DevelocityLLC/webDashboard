<?php

namespace Database\Seeders;

use App\Models\Admin;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class AdminSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->delete();
        $fake = Factory::create();

        $admin = Admin::create([
            'name'=>'admin',
            'email'=>'admin@yahoo.com',
            'password' => bcrypt('123'),
            'job_title' => 'admin company' ,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);
/*
        for ($i=1; $i < 5 ; $i++) {
            Admin::create([
                'name'=> $fake->name(),
                'email'=>$fake->email(),
                'password' => bcrypt('123'),
                'job_title' => 'admin company' ,
                'email_verified_at'=>now(),
                'remember_token'=>Str::random(10),
            ]);
        }
        */
    }
}
