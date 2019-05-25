<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // php artisan db:seed     class=UsersTableSeede
         $this->call(DiariesTableSeeder::class);
        // php artisan db:seed     class=DiariesTableSeede

          // seedが複複数だと登録する順番も大切
          // コマンドを登録して、間違えないようにする
    }
}
