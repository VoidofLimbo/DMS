<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    private $roles = [
        'DEV', 'OWNER',
        'GUEST',
        'HEAD ADMIN', 'ADMIN',
        'SENIOR DISPENSER', 'DISPENSER',
        'PICKER',
        'ENDORSER', 'BIODOSER',
        'PHARMACIST', 'CHECKER', 'FINAL CHECKER',
        'SENIOR DRIVER', 'DRIVER'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        foreach($this->roles as $role){
            $newrole = new Role();
            $newrole->title = $role;
            $newrole->save();
        }
    }
}
