<?php

namespace App\Http\Controllers;

use \Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function login(Request $request)
   {
       if(Auth::attempt(['user_name' => $request->user_name, 'password' => $request->password])) {
           $user = Auth::user();
           $success['token'] =  $user->createToken('MyApp')->plainTextToken;
           $success['user_name'] =  $user->user_name;

           return response()->json(["data" => $success, "message" => "Login successfully"]);
       }
       else{
           return response()->json(["errors" => "Unauthorised"], 401);
       }
   }
}
