<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //

 protected function login(Request $request){

      $data = $request->all();

      $userExist = User::query()->where('email', $data['email'])->first();

      if(! $userExist){
      	 return new JsonResponse(['res'=>0, 'data'=>[], 'msg'=> 'el usuario no existe']);
      }
      
      $userPassword = $userExist->password;

      if(!hash::check($data['password'],  $userPassword)){
      	   return new JsonResponse(['res'=>1, 'data'=>[], 'msg'=> 'La clave es incorrecta']);
      }

      return new JsonResponse(['res'=>1, 'data'=>['session'=> md5('arnaldo_lameda'), 'user'=>$userExist ], 'msg'=> 'Loggin exitoso']);
 	  
 	  //echo json_encode($request->headers->has('token'));
 }

}
