<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    //

    public function register(Request $request){
        $rules=[
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100|unique:users',
            'password'=> 'required|string|min:8'

        ];
        $validation=\Validator::make($request->input(), $rules);
        if ($validation->fails()) {
            $data=[
                'mensaje'=>'!Error en la validacion!!',
                'client'=> $validation->errors()->all()
            ];
            return response()->json($data,400);
        }
        $user=User::create([
        'name'=> $request->name,
        'email'=> $request->email,
        'password'=> Hash::make($request->password),
        ]);
        $data=[
            'mensaje'=>'!Usuario creado existosamente !!',
            'client'=> $user->createToken('Api token')->plainTextToken
        ];
        return response()->json($data,200);
    }
    public function login(Request $request){
        $rules=[

            'email'=>'required|string|max:100',
            'password'=> 'required|string'

        ];
        $validation=\Validator::make($request->input(), $rules);
        if ($validation->fails()) {
            $data=[
                'mensaje'=>'!Error en la validacion!!',
                'client'=> $validation->errors()->all()
            ];
            return response()->json($data,400);
        }
        if (!Auth::attempt($request->only('email','password'))) {
            $data=[
                'mensaje'=>'!Usuario no encontrado!!',
                'client'=> false,
            ];
            return response()->json($data,400) ;
        }
        $user=User::where('email',$request->email)->first();
        $data=[
            'mensaje'=>'!Usuario Correcto...!!',
            'client'=> false,
            'data'=> $user,
            'TOKEN'=> $user->createToken('Api token')->plainTextToken
        ];
        return response()->json($data,200) ;
    }

    public function logout(Request $request){  
        auth()->user()->tokens()->delete();
        return response()->json([
            'message'=> 'sesion terminada'
        ],200);

     }
}
