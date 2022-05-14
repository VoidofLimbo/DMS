<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get all created users
        foreach(User::all() as $user){
            // don`t seed developer
            if($user->id > 3){
                // can have upto 4 roles
                for( $i = 0; $i < (rand(1,4)); $i++){
                    // add random role
                    $user->roles()->attach(
                        Role::where('id','>',3)->inRandomOrder()->first()->id
                    );
                }
            }
        }
    }
}
