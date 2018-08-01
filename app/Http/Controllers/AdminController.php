<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Roles;
use App\Client;
use App\User;

use Mail;
use App\Mail\VerifyMail;
use App\VerifyUser;


class AdminController extends Controller
{



     public function signup(Request $request)

    {       
        $input = $request->all();
       // print_r($input);dd();
        $this->validate(request(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
           // 'password' => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
        ]);

       /* regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/*/
        /* $user = User::create(request(['first_name', 'last_name', 'email', 'role_id', 'client_id', 'password']));*/
        $user = new User();
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->email = $input['email'];
        $user->role_id = $input['role_id'];
    /*    $users->verified = 1;
         $users->password = bcrypt($input['password']);*/
        $user->save();

          $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);
 
        Mail::to($user->email)->send(new VerifyMail($user));
 

            return redirect()->route('userView')
            ->with('flash_message',
             'User successfully added.');
        
        
    }

    public function userActivate(Request $request){

      //  print_r($request->all());dd();
        if(isset($request['de_activate_id'])){

            $deactive = User::findOrFail($request['de_activate_id']);
            $deactive->acount_status = 0;
            $deactive->save();
        }

         if(isset($request['activate_id'])){
           // print_r($request['activate_id']);dd();
            $deactive = User::findOrFail($request['activate_id']);
            $deactive->acount_status = 1;
            $deactive->save();
        }

              return redirect()->back()->with('deactive_message');

    }
    


     public function addUsers(){

        if(Auth::check()){
         // print_r(Auth::user()->role_id);dd();
            if(Auth::user()->role_id == 1){
                 $roles = Roles::get();
                 $client = Client::get();
                 return view('users.create', compact('roles', 'client'));
         }
                else{
                  return redirect()->to('/login');
                }
       }


    }

     public function userView(){

        if(Auth::check()){
         // print_r(Auth::user()->role_id);dd();
            if(Auth::user()->role_id == 1){
               $id = Auth::user()->client_id;
                 $user = User::with('roles')/*->where('users.client_id', '=', $id)*/->get();
            return view('users.view', compact('user'));
                     }
                else{
                  return redirect()->to('/login');
                }
       }



   }


    public function getUsers(){

        $client = Client::with('user')->get()->toArray();
 //echo "<pre>";       
//dd($client);
       return $client;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

        $user = User::find($id);

        //DB::table('users')->select('users.*')->where('users.id', '=', $id)->get();
     
        return view('users.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $id){
         $user = User::findOrFail($id);

          $this->validate($request, [
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>'required|min:6|confirmed'
        ]);

            $input = $request->only(['first_name', 'last_name', 'email', 'password']);

            $user->fill($input)->save();

           return redirect()->route('userView')
            ->with('flash_message',
             'User Edit successfully edited.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

       // print_r($request->all());dd();

         $delUser = User::findOrFail($request['id']);
         $delUser->delete();

         \Session::flash('flash_message_delete','User successfully deleted.');
 
         return redirect()->back();
    }
}
