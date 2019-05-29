<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // マイグレートコマンド叩いた時に実行されるメソット
    // コマンド叩いたら、テーブルの中にlikesテーブルできてるはず
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('diary_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // ロールバックしたときに読まめるダウンメソッド
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
