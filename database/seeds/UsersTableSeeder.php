<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// クラスとしtw利用できるようにする

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pikopoko',
            'email' => 'pikopoko@gmail.com',
            'password' => bcrypt('123456'),
            // bcryptパスワードを暗号化するための記述
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]);
    }
}
