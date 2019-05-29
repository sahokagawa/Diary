<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

// class UseController extends Controller
// {
//     public function destroy($id)
// 				{
// 				   $user = User::find($id);
// 					 $user->delete();
// 				   return redirect('/');
// 		}

class AccountController extends Controller
{
  public function deleteData(Request $request)
  {
    $user = Users::find($request->input('id'));
    $user->delete();

    return view('deleteusers')
  }
}
