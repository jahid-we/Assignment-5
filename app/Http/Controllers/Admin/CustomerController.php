<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use App\Helper\JWTToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
    // User Controller start
    function UserRegistration(Request $request)
{
    try {
        $user = User::updateOrCreate(
            ['email' => $request->input('email')], // Unique identifier
            [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'password' => $request->input('password')// Hashing the password
            ]
        );

        return response()->json([
            'status' => 'success',
            'message' => 'User Registration Successfully'
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'User Registration Failed'
        ], 500);
    }
}

    function listAdmin(Request $request){
        try{
            $userId=$request->header('id');
            $users=User::where("id",$userId)->where("role","admin")->get();
            return response()->json([
                'status' => 'success',
                'data' => $users
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Admin List Failed'
            ], 500);
        }
     }

    // manage user

    function createUser(Request $request){
        try{
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'password' => $request->input('password')

            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'User Created Successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'User Creation Failed'
            ], 500);
        }
    }

    function listUser(Request $request){
       try{
           $users=User::where("role","customer")->get();
           return response()->json([
               'status' => 'success',
               'data' => $users
           ], 200);
       }catch(Exception $e){
           return response()->json([
               'status' => 'failed',
               'message' => 'User List Failed'
           ], 500);
       }
    }

    function adminListById(Request $request){
        try{
            $user=User::where("id",$request->input('id'))->first();
            return response()->json([
                'status' => 'success',
                'data' => $user
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => ' Failed to Get User'
            ], 500);
        }
    }

    function updateUser(Request $request){
        try{
            User::where("id",$request->input('id'))->update([
                'role' => $request->input('role')
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Updated Successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'User Update Failed'
            ], 500);
        }
    }


    function deleteUser(Request $request){
        try{
            User::where("id",$request->input('id'))->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User Deleted Successfully'
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'User Deletion Failed'
            ], 500);
        }
    }

    // manage user end


    function UserLogin(Request $request)
    {
        $count = User::where("email", $request->input('email'))
            ->where("password", $request->input('password'))
            ->where("role", "customer")
            ->select('id')
            ->first();

        if ($count !== null) {
            // User Login-> JWT Token Issue
            $token = JWTToken::CreateToken($request->input('email'), $count->id);
            return response()->json([
                'status' => 'success',
                'message' => 'User Login Successful',
            ], 200)->cookie('token', $token, time() + 60 * 24 * 30);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'unauthorized'
            ], 401);

        }
    }

    function SendOTPCode(Request $request){
        $email=$request->input('email');
        $otp=rand(100000,999999);
        $count=User::where("email",$email)->where("role","customer")->count();

        if($count==1){
            Mail::to($email)->send(new OTPMail($otp));
            User::where("email",$email)->update(["otp"=>$otp]);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Send Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Email Not Found'
            ],400);
        }

    }

    function VerifyOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count=User::where("email",$email)->where("role","customer")->where("otp",$otp)->count();
        if($count==1){
            User::where("email",$email)->update(["otp"=>"0"]);

            $token=JWTToken::CreateTokenForSetPassword($email);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verify Successfully',
            ],200);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'OTP Verify Failed'
            ],400);
        }
    }

    function ResetPassword(Request $request){

       try{
        $email=$request->header('email');
        $password=$request->input('password');
        User::where('email',$email)->where("role","customer")->update(['password'=>$password]);
        return response()->json([
            'status'=> 'success',
            'message'=> 'Password Reset Successfully'
            ],200);
       }catch(Exception $e){
        return response()->json([
            'status'=> 'failed',
            'message'=> 'Password Reset Failed'
            ],500);
       }
    }


    function Logout(Request $request){

        return redirect('/')->cookie('token','',-1);
    }





    // Admin Controller Start
    function AdminRegistration(Request $request)
    {
        try {
            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'role' => 'admin',
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Admin Registration Successfully'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Admin Registration Failed'
            ], 500);

        }
    }


    function AdminLogin(Request $request){

        $count = User::where("email", $request->input('email'))
            ->where("password", $request->input('password'))
            ->where("role","admin")
            ->select('id')
            ->first();

        if ($count !== null) {
            // Admin Login-> JWT Token Issue
            $token = JWTToken::CreateAdminToken($request->input('email'), $count->id,$count->role);
            return response()->json([
                'status' => 'success',
                'message' => 'Admin Login Successful',
            ], 200)->cookie('adminToken', $token, time() + 60 * 24 * 30);
        }else{
            return response()->json([
                'message' => 'unauthorized'
            ], 401);

        }
    }



    function SendAdminOTPCode(Request $request){
        $email=$request->input('email');
        $otp=rand(100000,999999);
        $count=User::where("email",$email)->where("role","admin")->count();

        if($count==1){
            Mail::to($email)->send(new OTPMail($otp));
            User::where("email",$email)->where("role","admin")->update(["otp"=>$otp]);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Send Successfully'
            ],200);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Email Not Found'
            ],400);
        }

    }

    function VerifyAdminOTP(Request $request){
        $email=$request->input('email');
        $otp=$request->input('otp');
        $count=User::where("email",$email)->where("otp",$otp)->where("role","admin")->count();
        if($count==1){
            User::where("email",$email)->update(["otp"=>"0"]);

            $token=JWTToken::CreateTokenForSetPassword($email);
            return response()->json([
                'status' => 'success',
                'message' => 'OTP Verify Successfully',
            ],200);
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'OTP Verify Failed'
            ],400);
        }
    }

    function ResetAdminPassword(Request $request){

       try{
        $email=$request->header('email');
        $password=$request->input('password');
        User::where('email',$email)->where("role","admin")->update(['password'=>$password]);
        return response()->json([
            'status'=> 'success',
            'message'=> 'Password Reset Successfully'
            ],200);
       }catch(Exception $e){
        return response()->json([
            'status'=> 'failed',
            'message'=> 'Password Reset Failed'
            ],500);
       }
    }


    function AdminLogout(Request $request){

        return redirect('/')->cookie('adminToken','',-1);

    }



}
