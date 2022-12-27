<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Cookie;
use Auth;

class UserAuthController extends Controller
{
    //

    public function makeCookie($token){
        return [
            "name" => "_token",
            "value" => $token,
            "expires" => 1440 ,
            "path" => "",
            "domain" => "",
            "httponly" => true,
            "secure" => null,
        ];
    }


    public function register(Request $r){
        $validator = Validator::make($r->all() , [
            "email" => "required | email | min:6 | max:25",
            "password" => "required | string",
            "name" => "required | string | min:6 | max:25"
        ]);

        if($validator->fails()){
            return response()->json([
                "msg" => "Error en algun campo",
                "error" => $validator->errors(),
            ], 401);
        }
        
        $user = User::create([
            "email" => $r->email,
            "name" => $r->name,
            "password" => bcrypt($r->password)
        ]);

        $token = $user->createToken("API Token")->accessToken;

        return response()->json([
            "msg" => "Usuario creado exitosamente",
            "user" => $user ,
            "token" => $token
        ],200);
    }


    public function login(Request $r){
        
        $validator = Validator::make($r->all() , [
            "email" => "required | email | min:6 | max:25",
            "password" => "required | string",
        ]);

        if($validator->fails()){
            return response()->json([
                "msg" => "Hubo un error en algun campo",
                "error" => $validator->errors(),
            ],401);
        }

        if(Auth::attempt(["email" => $r->email, "password" => $r->password])){
            $user = Auth::user();
            $token = $user->createToken("API Token")->accessToken;
            $cookie = $this->makeCookie($token);
            return response()->json([
                "msg" => "Ingreso exitoso",
                "user" => $user ,
                "token" => $token
            ],200)->withCookie(
                $cookie["name"],
                $cookie["value"],
                $cookie["expires"],
                $cookie["path"],
                $cookie["domain"],
                $cookie["secure"],
                $cookie["httponly"],
            );
        }
    }


    public function logout(Request $r){
        $user = Auth::user("api");
        $tokens = Auth::user()->tokens;
        foreach($tokens as $token){
            $token->delete();
        }

        return response()->json([
            "msg" => "Cierre de sesion exitoso",
            "user" => $user
        ],200);
    }



    public function getUserInfo(Request $r){
        // return response()->json([
        //     "token" => $r->header("Authorization"),
        // ],200);

        $user = Auth::guard("api")->user();
        return response()->json([
            "msg" => "Proceso extioso",
            "user" => $user,
            "demo" => $r["prueba"],
            "ip" => $r->ip(),
        ],200);
    }


}
