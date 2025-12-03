<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
public function register(Request $request)

     {
 
         $validator = Validator::make($request->all(), [
 
             'name' => 'required',
 
             'email' => 'required|email',
 
             'password' => 'required',
 
             'c_password' => 'required|same:password',

             'g-recaptcha-response' => 'required',
 
         ]);
 
    
 
         if($validator->fails()){
 
             return $this->sendError('Validation Error.', $validator->errors());       
 
         }

          $response = Http::withoutVerifying()->asForm()
            ->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $request->input('g-recaptcha-response'),

            ]);



        $captcha = $response->json();
        if (empty($captcha['success']) || !$captcha['success']){
            return response()->json(['success' => false, 'message' => 'Échec de la vérification reCAPTCHA'], 400);
        }
        
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

         return response()->json(['success' => true, 'message' => 'Utilisateur enregistré avec succès', 'data' => [
            'token' => $user->createToken('MyApp')->plainTextToken,
            'name' => $user->name
         ]], 201);

         //$input = $request->all();
 
         //$input['password'] = bcrypt($input['password']);
 
         //$user = User::create($input);
 
         //$success['token'] =  $user->createToken('MyApp')->plainTextToken;
 
         //$success['name'] =  $user->name;
        // $success['id'] =  $user->id;  la réponse lors de l'enregistrement peut aussi être l'id et le token
 
     }
     /**
 
      * Login api
 
      *
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function login(Request $request)
 
     {
 
         if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
 
             $user = Auth::user(); 
 
             $success['token'] =  $user->createToken('MyApp')->plainTextToken; 
 
             $success['name'] =  $user->name;
 
             return response()->json([$success, "message"=> 'User login successfully.']);
 
         } 
 
         else{ 
 
             return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
 
         } 
 
     }

    public function logout(Request $request)
    {
        $user = $request->user(); // ou Auth::user()

        if ($user) {
            // Supprime tous les tokens API
            $user->tokens()->delete();

            // **Ne pas appeler Auth::logout() ici !**
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Logout failed. User not authenticated.'
        ], 401);
    }




    protected function sendError($message, $errors = [], $code = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $code);
    }



}
