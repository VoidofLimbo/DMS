<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // developer the superuser
        $superadmin = new User();
        $superadmin->name = 'Dev';
        $superadmin->email = 'dev@dev.com';
        $superadmin->email_verified_at = now();
        $superadmin->password = Hash::make('developer');
        $superadmin->remember_token = Str::random(10);
        $superadmin->save();

        // user with maximum the access
        $owner = new User();
        $owner->name = 'Owner';
        $owner->email = 'owner@owner.com';
        $owner->email_verified_at = now();
        $owner->password = Hash::make('password');
        $owner->remember_token = Str::random(10);
        $owner->save();

        // user with minimal access
        $guest = new User();
        $guest->name = 'Guest';
        $guest->email = 'guest@guest.com';
        $guest->email_verified_at = now();
        $guest->password = Hash::make('password');
        $guest->remember_token = Str::random(10);
        $guest->save();

        // must have roles for demonstration
        $superadmin->roles()->attach(Role::SUPER_ADMIN);
        $guest->roles()->attach(Role::DEFAULT_ROLE);
        $owner->roles()->attach(Role::OWNER);
    }
}
