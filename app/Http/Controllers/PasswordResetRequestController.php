<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Validator;
class PasswordResetRequestController extends Controller
{
    public function sendPasswordResetEmail(Request $request){
        $request->validate([
            'email'=>'required|email|string|max:255'
        ]);
         if(!$this->validEmail($request->email)) {
            return response()->json([
                'error' => 'El correo electrónico proporcionado no existe.'
            ], 400);
        }  else {
            // If email exists
            $this->sendMail($request->email);
            return response()->json([
                'message' => 'Comprueba la bandeja de entrada, ya le hemos enviado el correo para recuperar su contraseña.'
            ], Response::HTTP_OK);            
        }
    }

    public function sendMail($email){
        $token = $this->generateToken($email);
        Mail::to($email)->send(new SendMail($token));
    }
    public function validEmail($email) {
        
       return !!User::where('email', $email)->first();
       
    }
    public function generateToken($email){
      $isOtherToken = DB::table('recover_password')->where('email', $email)->first();
      if($isOtherToken) {
        return $isOtherToken->token;
      }
      $token = Str::random(80);;
      $this->storeToken($token, $email);
      return $token;
    }
    public function storeToken($token, $email){
        DB::table('recover_password')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()            
        ]);
    }
    
}