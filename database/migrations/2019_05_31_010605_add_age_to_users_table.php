<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAgeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('age');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColum('age');
        });
    }
}



// 年齢も登録したい

// カラム追加の仕方
// コマンド叩いて新しいファイルつくるphp artisan make:migration add_age_to_users_table
// できたファイルのupとdownをかく
// コマンド叩いて実行するphp artisan migrate

// viewの編集
// Authの中のregisterにage追加
// 年齢だから数字しか入れれんように type="number"にする

//あとモデルとコントローラーの修正

// user.php     protected $fillable  ホワイトリストって言ってセキュリティ対策の一つ
// 'name', 'email', 'password', 'age', はブラウザからサーバーに送れる！
// 逆はブラックリスト

//Auth の中のregiterコントローラー
// それぞれのメソッドにageを追加
// 入力必須required












