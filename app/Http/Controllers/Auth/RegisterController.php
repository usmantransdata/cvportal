<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;
use App\VerifyUser;
use Illuminate\Auth\Events\Registered;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

   
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function verifyUser($token)
    {
        if (Auth::check()) {
            Auth::logout();
        }
        $verifyUser = \App\VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now set your password.";
            }else{
                $status = "Your e-mail is already verified. You can now set your password.";
            }
        }else{
            return redirect('login')->with('warning', "Sorry your email cannot be identified.");
        }
   
 
        return redirect()->route('setPassword', $verifyUser->user->id)->with('status', $status);

        //return view('auth.setPassword')->withData($id);

    }

    public function setPassword($id){

       return view('auth.setPassword', compact('id'));
    }

    public function savePassword(Request $request){
        $input = $request->all();
      // print_r();dd();
         $user = User::find($input['id']);
         //print_r($user);dd();
        $user->password = bcrypt($input['password']);
        $user->save();

         return $this->registered($request, $user);
    }

    protected function registered(Request $request, $user)
    {   
      
            Auth::loginUsingId($user->id);
            return redirect()->to('viewData');
       
      // return $this->guard()->login($user);
    }
}
