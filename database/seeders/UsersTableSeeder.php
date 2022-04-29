<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->truncate();
        DB::table('users')->insert([
            'first_name' => 'Software',
            'last_name' => 'Tester',
            'email' => 'admin@demo.com',
            'password' => Hash::make('123456'),
            'verified' => 1,
            'is_admin' => 1,
            'user_type' => 'staff',
            'branch_id' =>1,
            'token' => ''
        ]);

        DB::table('users')->insert([
            'first_name' => 'Cedric',
            'last_name' => 'Baja',
            'email' => 'baja@thesis.com',
            'password' => Hash::make('123456'),
            'verified' => 1,
            'is_admin' => 0,
            'role_id' => 2,
            'user_type' => 'staff',
            'token' => '',
            'branch_id' =>2,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Ernie',
            'last_name' => 'Abao',
            'email' => 'abao@thesis.com',
            'password' => Hash::make('123456'),
            'verified' => 1,
            'is_admin' => 0,
            'role_id' => 2,
            'user_type' => 'staff',
            'token' => '',
            'branch_id' =>2,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Carlo Daniel',
            'last_name' => 'Sanchez',
            'email' => 'sanchez@thesis.com',
            'password' => Hash::make('123456'),
            'verified' => 1,
            'is_admin' => 0,
            'role_id' => 2,
            'user_type' => 'staff',
            'token' => '',
            'branch_id' =>2,
        ]);

        DB::table('users')->insert([
            'first_name' => 'Carlos Owen',
            'last_name' => 'Taqueban',
            'email' => 'taqueban@thesis.com',
            'password' => Hash::make('123456'),
            'verified' => 1,
            'is_admin' => 0,
            'role_id' => 2,
            'user_type' => 'staff',
            'token' => '',
            'branch_id' =>2,
        ]);
    }
}
