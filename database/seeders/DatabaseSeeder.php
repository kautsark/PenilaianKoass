<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('table_role_users')->insert([
            'role_name' => 'Administrator',
            'created_at' => Carbon::now(),
            'created_by' => 'Kautsar kustijadi',
        ]);
        DB::table('users')->insert([
            'name'=> 'kautsar kustijadi',
            'email'=> 'kautsarkustijadi@gmail.com',
            'password'=>Hash::make('cau220788'),
            'id_role' => '1',
            'role_name' => 'Administrator',
            'created_at' => Carbon:: now(),
        ]);


    // $this->call([
    //     UserSeeder::class,
    // ]);
    }
}
