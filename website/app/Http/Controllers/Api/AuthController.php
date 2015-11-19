<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\MessageBag;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller {
  /**
   * API Login, on success return JWT Auth token
   *
   * @param Request $request
   * @return \Illuminate\Http\JsonResponse
   */
  public function login(Request $request) {
    $credentials = $request->only('email', 'password');

    try {
        // attempt to verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
    } catch (JWTException $e) {
        // something went wrong whilst attempting to encode the token
        return response()->json(['error' => 'could_not_create_token'], 500);
    }

    // all good so return the token
    return response()->json(compact('token'));
  }


  /**
   * Log out
   * Invalidate the token, so user cannot use it anymore
   * They have to relogin to get a new token
   * 
   * @param Request $request
   */
  public function logout(Request $request) {
      $this->validate($request, [
          'token' => 'required' 
      ]);
      
      JWTAuth::invalidate($request->input('token'));
  }
}
// class ApiLoginController extends Controller
// {
//   use AuthenticatesAndRegistersUsers;

//   public function __construct(Guard $auth)
//   {
//     $this->auth = $auth;
//   }
//   public function login(Request $request)
//   {
//     $userData = $request->all();
//     $rules =[
//       "email"     =>  "required|email", 
//       "password"  =>  "required",
//     ];
//     $validator = Validator::make($userData,$rules);
//     $credentials = $request->only("email", "password");
//     if($validator->fails()){
//       return response()->json(array(
//        "fail" => true,
//        "errors" => $validator->getMessageBag()->toArray()
//       ));
//     }else{
//       if ($this->auth->attempt($credentials, $request->has("remember")))
//       {
//         // Session::put("lang", $this->auth->user()->lang);
//         return response()->json(array(
//          "success" => true,
//          "user" => Auth::user(),
//          // "profile" => Auth::user()->profile,
//          // "histories" => Auth::user()->histories,
//         ));
//       }
//       else{
//         return response()->json(array(
//          "fail" => true,
//          "errors" => new MessageBag(["password" => "Email and/or password invalid"])
//         ));
//       }
//     }
//   }
// }
