<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {

            DB::table('users')->insert([
                [
                    'id' => '1',
                    'name'  => 'NewUser',
                    'email'     => 'myemail@example.org',
                    'password'  => '123456',
                    'created_at' => '2021-01-10 12:00:00',
                    'updated_at' => '2021-01-10 12:00:00',
                ],
            ]);

        } catch (\Exception $e) {
            echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
        }
    }

}