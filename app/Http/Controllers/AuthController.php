<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class AuthController extends Controller
{
    public function index(){
        
        return view('auth.login');
    }
    public function signup(){
        return view('auth.signup');
    }

    public function userRegister(Request $request) : JsonResponse{

        // dd($request->all());
        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => []
        ];
        try {
            $validate = Validator::make($request->all(), [
                "email_address" => ['required','unique:users,email_address'],
                "password" => ['required', 'min:6', "max:255"],
                "username" => ['required'],
                

            ]);
            // dd($validate);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Form Validaton Error");
            }

            $user= User::create([
                'email_address' => $request->email_address,
                'name' => $request->username,
                'password' => Hash::make($request->password),
            ]);
            // dd($user);

            // Auth::login($user);

            $response['status'] = True;
            $response['msg'] = "Form saved Successfully";

        } catch (Exception $e) {
            DB::rollBack();
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    }

            // FOr login
    public function userLogin(Request $request) : JsonResponse{
        // dd($request->all());
        $response = [
            'status' => False,
            "msg" => "Something went wrong!",
            "result" => ""
        ];


        try {
            $validate = Validator::make($request->all(), [
                "email_address" => ['required'],
                "password" => ['required', 'min:6', "max:255"],
            ]);
            // dd($validate);

            if ($validate->fails()) {
                $response['result'] = $validate->errors()->toArray();
                throw new Exception("Invalid Credentials");
            }

            $credentials = [
                'email_address' => $request->email_address,
                'password' => $request->password,
            ];
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                $response['status'] = True;
                $response['msg'] = "Login Successfully";
            }else{
                $response['msg'] = "Invalid Credentials";
            }
        }
        catch (Exception $e)
         {
            $response['msg'] = $e->getMessage();
        }

        return response()->json($response);
    
    }
    
}
