<?php

use Illuminate\Database\Seeder;

class Useradminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = App\User::create([
            'admin'=>1,
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('password')
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/admin/man.png',
            'about' =>'greengreen green greengreengreen greengreengreengreengreengreengreengreengreengreen greengreengreengreen greengreengreengreengreengreen greengreen',
            'facebook'=>'facebook.com',
            'youtube'=>'youtube.com'


        ]);

    }
}
