<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
	  public function likes()
	  {
	      return $this->belongsToMany('App\User', 'likes')->withTimestamps();
		 }

}


// belongsToManyメソッドで多対多であることを示す