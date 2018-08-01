<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Roles;
use App\Client;
use App\User;

class HomeController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
            {
                if(Auth::user()->role_id == 1){

                     $orderBatch = \App\BatchDetail::with('client')->with('batchStatus')->get();
       
                        return view('index', compact('orderBatch'));
                }else
                {
                    return redirect()->to('viewData');
                }
            }
        
    } 
 protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'created_by' => $data['name'],
            'password' => bcrypt($data['password']),

        ]);
    }
    
}
