<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // users テーブル作る
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // テーブル追加するときここに追加したらいけん
            // 一回読み込んだらもういじっちゃいけん
            //変更したかったら、migrationふぁいるを作る

            // コマンドで、php artisan migrate:rollbackで一つ前に戻る
            // rollback（処理を取り消す）した時に読みこまれるのは、down メソッド
            // 作った時に読み込まれるのはupメソッド

            // もうよくわからん！ってなった時は　php artisan migrate :refresh
            // それでもダメなら php artisan migrate:fresh
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
