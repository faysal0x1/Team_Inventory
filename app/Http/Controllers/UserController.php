<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use Exception;
use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use App\Helper\ResponseHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function userRegistration(Request $request)
    {
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $password = $request->input('password');

          

            $count = User::where('email', $email)->count();

            if ($count === 1) {
                return ResponseHelper::Out('failed', 'Email already registered', [], 200);
            } else {
                User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                ]);

                $otp = rand(1000, 9999);

                Mail::to($email)->send(new OtpMail($otp));

                User::where('email', $email)->update(['otp' => $otp]);

                return ResponseHelper::Out('success', 'OTP sent successfully', [], 200);

            }

        } catch (Exception $e) {
          
            return ResponseHelper::Out('failure', 'Something went wrong', [], 200);
        }
    }

    public function verifyNewUser(Request $request)
    {
        try {
            $email = $request->input('email');
            $otp = $request->input('otp');

            $count = User::where('email', $email)->where('otp', $otp)
                ->update(['otp' => 0, 'is_verified' => true]);

            if ($count === 1) {
                return ResponseHelper::Out('success', 'User verified, you can login now', [], 200);
            } else {
                return ResponseHelper::Out('failed', 'Otp does not match, Try again', [], 200);
            }

        } catch (Exception $e) {
            return ResponseHelper::Out('failed', 'Some went wrong', [], 200);
        }
    }

    public function login(Request $request){
        try{
            $email = $request->input('email');
            $password = $request->input('password');

            $user = User::where('email', $email)->first();

            if (!$user) {
                return ResponseHelper::Out('unregistered', 'User not found,Please register', [], 200);
            }
            else if (!$user->is_verified){
                return ResponseHelper::Out('unverified', 'User is not verified', [], 200);
            }
            else{
                if(Hash::check($password,$user->password)){

                   $token = JWTToken::CreateToken($user->email, $user->id); 
                   return response()->json([
                    'status' => 'success',
                    'message' => "Login successful",
                    'token' => $token,

                ], 200)->cookie('token', $token, 60 * 24 * 30);
                    
                }else{
                    return ResponseHelper::Out('failed', 'Password does not match', [], 200);
                }
            }

        }catch (Exception $e){
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);

        }
    }

    public function sentOtp(Request $request)
    {
        try {

            $email = $request->input('email');
            $otp = rand(1000, 9999);

            $count = User::where('email', $email)->count();
            if($count===1){
                Mail::to($email)->send(new OtpMail($otp));

                User::where('email', $email)->update(['otp' => $otp]);
              
                return ResponseHelper::Out('success', 'OTP sent successfully', [], 200);

            }else{
                return ResponseHelper::Out('failed', 'User Not Found', [], 200);
            }

           

        } catch (Exception $e) {
         
            return ResponseHelper::Out('failure', 'Something went wrong', [], 200);

        }
    }

    public function verifyOtp(Request $request){
        try{
            $email = $request->input('email');
            $otp = $request->input('otp');
          
            $count = User::where('email', $email)->where('otp', $otp)->count();

            if($count===1){
                User::where('email', $email)->update(['otp'=>'0']);
                //password reset token issue
                $token = JWTToken::CreateTokenForOtp($email);
                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP Verification successfully',
                    'token' => $token,

                ], 200)->cookie('token', $token, 60 * 1);
            }else {
                return ResponseHelper::Out('failed', 'Otp does not match', [], 200);
            }
        }catch (Exception $e){
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);

        }
    }

    public function resetPassword(Request $request){
        try{
            $email = $request->header('email');
            $password = $request->input('password');

            $hashedPassword = Hash::make($password);

            $count = User::where('email',$email)->update(['password' => $hashedPassword]);
            if($count===1){

                return ResponseHelper::Out('success', 'Password reset successfully', [], 200);

            }else{

                return ResponseHelper::Out('failed', 'Password reset failed', [], 200);

            }

        }catch (Exception $e){
            return ResponseHelper::Out('failed', 'Something went wrong', [$e], 200);

        }
    }

    public function logout(){
        return redirect('/')->cookie('token','',-1);
        }
    



}
