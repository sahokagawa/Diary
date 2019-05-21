<?php

use Illuminate\Database\Seeder;
// 下でCarbonとかあるかあら、つか得るようにしてあげる
// ちなみに日付の関数
// raraberuに最初から入っている
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DiariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// array()の省略形
        $diaries = [
        	[
        		"title" =>"セブでプログラミング",
        		"body"	=>"気づけばもうすぐ２ヶ月"
        	],
        	[
        		"title" =>"週末は旅行",
        		"body"	=>"オスロブに行った"
        	],
        	[
        		"title" =>"英語の授業",
        		"body"	=>"楽しい"
        	]
        ];

// 配列形式でinsert（登録）してる
        foreach ($diaries as $diary) {
        	DB::table("diaries")->insert([
        		"title" => $diary["title"],
        		"body" => $diary["body"],
        		"created_at" => Carbon::now(),
        		'updated_at' => Carbon::now()
        	]);
        }
    }
}

// php artisan db:seed --class=DiariesTableSeederコマンド叩いて確認してみる