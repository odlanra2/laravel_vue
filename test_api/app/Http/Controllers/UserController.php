<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

 protected function login(Request $request){

 	  echo json_encode($request->headers->has('token'));
 }

}
