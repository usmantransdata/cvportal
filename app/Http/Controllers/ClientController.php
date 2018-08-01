<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CsvImportRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\User;
use App\BatchDetail;
use App\CotentBatch;
use App\CompanyManager;
use Excel;
use Session;  
use Auth;
use DB;
use Mail;
use App\Mail\VerifyMail;
use App\VerifyUser;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ClientController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::check()){
            if(Auth::user()->role_id == 1){
               $CompanyManager = User::where('role_id', '=', 2)->get();
                return view('clients.create', compact('CompanyManager'));
            }
                else{
                  return redirect()->to('/login');
                }
      }
    }

    public function importcsv(Request $request)
        {
         
        $supplier_name = $request->supplier_name;
        $extension = $request->file('file');
        $extension = $request->file('file')->getClientOriginalExtension(); 
        // getting excel extension
        $dir = 'storage/app/csvfiles/';
        $filename = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
        $request->file('file')->move($dir, $filename);
        return $filename;
        }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
      public function processImport(Request $request)
    {
      $input = $request->all(); 
    // print_r($input);dd();
      $path = "storage/app/csvfiles/".$input['csvdatafile'];
       $data = Excel::load($path, function($reader) {})->get()->toArray();
       $id = Auth::user()->id; 
                
                $batch_detail = new  BatchDetail();
                $batch_detail->uploader_id = $id;
                $batch_detail->client_id = $input['company'];
                $batch_detail->batch_name = $input['batch_name'];
                $batch_detail->status_id = 1;
                $batch_detail->instructions = $input['instructions'];
                $batch_detail->due_date = $input['due_date'];
                 if(isset($input['validate_email'])){
                if($input['validate_email'] == 'on'){
                $batch_detail->is_email_verified = 1;
                    }
                  }
               $batch_detail->save();
           
               $cols = array();
               $count = 0; 

             //  echo $batch_detail->id;
               foreach ($data as $key => $value) {
                    
                    $count++;
                    $cols['batch_id'] = $batch_detail->id;
                    $cols['first_name'] =$value[strtolower(str_replace(" ","_",$input['first_name']))];
                    $cols['last_name'] =$value[strtolower(str_replace(" ","_",$input['last_name']))];
                     $cols['title'] =$value[strtolower(str_replace(" ","_",$input['title']))];
                    $cols['company_name'] =$value[strtolower(str_replace(" ","_",$input['company_name']))];
                    $cols['email1'] =$value[strtolower(str_replace(" ","_",$input['email1']))];
                    $cols['email2'] =$value[strtolower(str_replace(" ","_",$input['email2']))];
                    $cols['email3'] =$value[strtolower(str_replace(" ","_",$input['email3']))];
                    $cols['phone_number1'] =$value[strtolower(str_replace(" ","_",$input['phone_number1']))];
                    $cols['phone_number2'] =$value[strtolower(str_replace(" ","_",$input['phone_number2']))];
                    $cols['phone_number3'] =$value[strtolower(str_replace(" ","_",$input['phone_number3']))];
                    $cols['address1'] =$value[strtolower(str_replace(" ","_",$input['address1']))];
                    $cols['address2'] =$value[strtolower(str_replace(" ","_",$input['address2']))];
                    //$cols['address3'] =$value[$input['address3']))];
                    $cols['city'] =$value[strtolower(str_replace(" ","_",$input['city']))];
                    $cols['state'] =$value[strtolower(str_replace(" ","_",$input['state']))];
                    $cols['zip'] =$value[strtolower(str_replace(" ","_",$input['zip']))];
                    $cols['country'] =$value[strtolower(str_replace(" ","_",$input['country']))];
                    $cols['disposition'] ='';
                    $cols['validation'] ='';
                    $cols['health_status'] ='';
                    $data = CotentBatch::create($cols);
                   
                  
                }
         
                BatchDetail::where('id', $batch_detail->id)->update(array('total_record_count' => $count));
                  
                return "You successfully added new batch order!";
               // return redirect()->route('viewData')->with('message', 'You successfully added new batch order!!'); 
      

    }
    public  function get_contentbatch_columns(Request $request){
      $input = $request->all(); 
      //print_r($input['csvcolumns']);
      $contentbatch = new CotentBatch;
      $content_batch_colums = $contentbatch->getTableColumns();
      //print_r($content_batch_colums);
      $returndata='';
      foreach ($content_batch_colums as $key => $value)
      {
        if($value!='id' && $value!='batch_id' && $value!='address3' && $value!='health_status' && $value!='disposition' && $value!='validation' && $value!='created_date' && $value!='updated_date')
          {
          $returndata.="<tr><td>".ucfirst(str_replace('_', ' ', $value)).":</td><td>";
          $returndata.= '<select name="'. $value.'">';
            foreach ($input['csvcolumns'] as $db_field)
            {
            $returndata.='<option value="'. $db_field.'">'. $db_field.'</option>';
            }
          $returndata.="</select></td></tr>";
          }
      }
     
      return$returndata;
      //return $tablecolums = $contentbatch->getTableColumns(); 
    }
   
    public function readcsv(Request $request)
    {
    
    $input = $request->all(); 
    
    $filename = $request->file('csv_file')->getClientOriginalName();
    $path=$request->file('csv_file')->storeAs('csv', $filename);
    //print_r($path);
    //dd();
    $fullpath="storage/app/";
     //Excel::load($request->file('uploaded_file')->getRealPath(), function ($reader) {
    if ($request->has('header')) {
        $data = Excel::load($fullpath.$path, function($reader) {})->get()->toArray();
    } else {
        $data = array_map('str_getcsv', file($fullpath.$path));
    }
    //print_r($data);
    $filename=$path;
    //dd();
    $contentbatch = new CotentBatch;
    $tablecolums = $contentbatch->getTableColumns();
    //print_r($tablecolums);
    
   $csv_header_fields=array_keys($data[0]);
    //print_r(array_keys($data[0]));
//print_r(sizeof($data));
   
    if (sizeof($data) > 0) {
        if ($request->has('header')) {
            $csv_header_fields = [];
            foreach ($data[0] as $key => $value) {
                $csv_header_fields[] = $key;
            }
        }
        $csv_data = $data;
        $batch_name=$input['batch_name'];
        $due_date=$input['due_date'];
        $instructions=$input['instructions']; 
        $header=$input['header'];
        $company=$input['company'];
        $totalcounts=sizeof($data);
      
     //print_r(($data));   
    } else {
        return redirect()->to('/login');
    }
    return view('data.choose_fields', compact('totalcounts','company','batch_name','due_date','instructions','header', 'filename','csv_header_fields', 'csv_data', 'tablecolums'));
    }
    public function store(Request $request)
    {
        $input = $request->all();
       
        $validatoin =  $this->validate($request,[
          'organization_name' => 'required|string|max:255|unique:client',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'phone_number' => 'required|regex:/(01)[0-9]{9}'
           // 'phone_number' => 'required|regex:/(01)[0-9]{9}/'

          ]); 

          if ($validatoin) {

         $client = new Client;
       
           $client->organization_name = $input['organization_name'];
           $client->contact_first_name = $input['first_name'];
           $client->contact_last_name = $input['last_name'];
           $client->contact_person_email = $input['email'];
           $client->contact__person_phoneNumber = $input['phone_number'];
           $client->address1 = $input['address1'];
           $client->address2 = $input['address2'];
           $client->country = $input['country'];
           $client->city = $input['city'];
           $client->zip = $input['zip'];
           $client->state = $input['state'];
           $client->save();

             $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'role_id' => '5',
            'client_id' => $client->id,
            //'password' => bcrypt($data['password']),
        ]);

        if(isset($input['manager_name'])){

          \App\CompanyManager::create([
            'user_id' => $input['manager_name'],
            'client_id' => $client->id,
        ]);

          if(isset($input['switch-field-1'])){
            if($input['switch-field-1'] == 'on'){
             // echo "string";dd();
            $enableUser = User::findOrFail($user->id);
            $enableUser->acount_status = 1;
            $enableUser->save();
              }else{
                  $enableUser = User::findOrFail($user->id);
            $enableUser->acount_status = 0;
            $enableUser->save();
              }
          }

           $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);
 
        Mail::to($user->email)->send(new VerifyMail($user));
 

            return redirect()->route('client.view')
            ->with('flash_message',
             'User successfully added.');
        
        }else{
            
              return back()->with('error_message',
             'You are facing some error while saving new client please refresh and try again');
        }
    }

  }

    public function completedBatch($id){

      $completedBatch = CotentBatch::where('batch_id', '=', $id)->get();
      $batchDetail = BatchDetail::find($id);

      return view('data.completeData', compact('completedBatch', 'batchDetail'));
    }


    //compare files 
    public function compareFiles(Request $request){
     
       $cols = array();
       $orderBatach=array();
             $input = $request->all();
          if($request->hasFile('uploaded_file')){

           Excel::load($request->file('uploaded_file')->getRealPath(), function ($reader) {
               $count = 0; 

               $existingdata = CotentBatch::where('batch_id', '=', Input::get('file_id'))->get()->toArray();
               $importdata=$reader->toArray();
               $oldids=array();
               $importids=array();
               $badrecords=0;
               $goodrecords=0;
          

               for($i=0;$i<sizeof($importdata);$i++)
               {
               $importids[]=$importdata[$i]['id'];
               }

                for($j=0;$j<sizeof($existingdata);$j++)
                
                {                  
                                  
                      if(in_array($existingdata[$j]['id'], $importids))
                        {

                          $key=array_search($existingdata[$j]['id'],$importids);
                                $status=0;   

                                if($existingdata[$j]['first_name']!=$importdata[$key]['first_name'])
                                 {
                                 $existingdata[$j]['health_status']="Bad Record";
                                }
                                elseif($existingdata[$j]['last_name']!=$importdata[$key]['last_name'])
                                 {
                                 $existingdata[$j]['health_status']="Bad Record";
                                }

                                elseif($existingdata[$j]['company_name']!=$importdata[$key]['company_name'])
                                 {
                                 $existingdata[$j]['health_status']="Bad Record";
                                }
                                 
                                elseif($existingdata[$j]['title']!=$importdata[$key]['title'])
                                 {
                                 $existingdata[$j]['health_status']="Bad Record";
                                 
                                }
                                elseif($existingdata[$j]['phone_number1']!=$importdata[$key]['phone_number1'])
                                 {
                                 $existingdata[$j]['health_status']="Bad Record";
                                 
                                }
  
                                elseif($existingdata[$j]['address1']!=$importdata[$key]['address1'])
                                 {
                                 $existingdata[$j]['health_status']="Bad Record";
                                 $barrecords=1;
                                }
                                 else{
                                  $existingdata[$j]['health_status']="Good Record";
                                   
                                    
                                    $existingdata[$j]['id']= $importdata[$key]['id'];
                                    $existingdata[$j]['batch_id']=$importdata[$key]['batch_id'];

                                     $existingdata[$j]['disposition']= $importdata[$key]['disposition'];
                                     $existingdata[$j]['validation']= $importdata[$key]['validation'];
                                     $existingdata[$j]['is_email_verified']= $importdata[$key]['validation'];

                                    if(is_null($existingdata[$j]['disposition'])){
                                   $existingdata[$j]['disposition']= $importdata[$key]['disposition'];
                                  }

                                  
                                     if(is_null($existingdata[$j]['validation'])){
                                   $existingdata[$j]['validation']= $importdata[$key]['validation'];
                                  }

                                }
                             }
                        else{

                              $existingdata[$j]['health_status']="Record Not Found";
                              $badrecords=1;
                        }
                 
                    } 

                   $GLOBALS['variable'] = $existingdata; 
                    $GLOBALS['badrecords'] = $badrecords; 

                    if($badrecords==0)
                    {
                        \App\CompareData::where('batch_id', '=', $existingdata[0]['batch_id'])->delete();
                    foreach ($existingdata as $value) {  

                      \App\CompareData::create($value);
                    }
                    }
          
            
             });
            return view('data.dataResult', compact($GLOBALS['variable'],$GLOBALS['badrecords']));
         
         }
   

    }

     public function uploadGoodRecords($id){
       $completed_data_table = \App\CompareData::where('batch_id', '=', $id)->get();
      
        foreach ($completed_data_table as  $value) {
      
        $update = \App\CotentBatch::where('id', '=', $value->id)->update(['validation'=> $value->validation, 'disposition'=> $value->disposition, 'health_status'=> $value->health_status, 'company_name'=> $value->company_name, 'is_email_verified'=> $value->is_email_verified] );
        }
        \App\BatchDetail::where('id', '=', $id)->update(['status_id' => 4]);


             return redirect()->route('viewData');
        }

    public function clientFullView($id){

       if(Auth::check()){
          if(Auth::user()->role_id == 1){
                $clients = Client::with('CompanyManager')->findOrFail($id);
               return view('clients.clientFullView', compact('clients'));
           }
                else{
                  return redirect()->to('/login');
                }
       }

     }
    public function view(){

        if(Auth::check()){
        if(Auth::user()->role_id == 1){
               $client_info = Client::with('CompanyManager')->get();
              $user = User::where('role_id', '=', '2')->get(); 
              return view('clients.view', compact('client_info', 'user'));
             }
                else{
                  return redirect()->to('/login');
                }
       }

        
    }

   /* public function importExcel(Request $request)
    {  
           $cols = array();
             $input = $request->all();
             print_r($input);dd();
          if($request->hasFile('import_file')){

           Excel::load($request->file('import_file')->getRealPath(), function ($reader) {
               $count = 0; 
                $id = Auth::user()->id; 

                 $batch_detail = new  BatchDetail();
                $batch_detail->uploader_id = $id;
                $batch_detail->client_id = Input::get('company');
                $batch_detail->batch_name = Input::get('batch_name');
                $batch_detail->status_id = 1;
                $batch_detail->instructions = Input::get('instructions');
               $batch_detail->save();

                foreach ($reader->toArray() as $key => $value) {
                   $count++;
                  $cols['batch_id'] = $batch_detail->id;
                    $cols['first_name'] = $value['first_name'];
                    $cols['last_name'] = $value['last_name'];
                    $cols['title'] = $value['title'];
                    $cols['phone_number'] = $value['phone_number'];
                    if($value['validation'] != null){
                    $cols['validation'] = $value['validation'];
                         }else{

                            $cols['validation'] = ''; 
                         }

                          if($value['disposition'] != null){
                     $cols['disposition'] = $value['disposition'];
                         }else{

                            $cols['disposition'] = ''; 
                         }
                    $cols['disposition'] = $value['disposition'];
                    $cols['organization'] = $value['organization'];
                    $cols['address1'] = $value['state'];
                    $cols['address2'] = $value['country'];
               
                    if(!empty($cols)) {

                     $data = OrderBatch::create($cols);
                    }
                 
                  
                }
                BatchDetail::where('id', $batch_detail->id)->update(array('total_record_count' => $count));

            });
            
          
             return redirect()->route('viewData')->with('message', 'You successfully added new batch order!!');
        }
        else
        {

            return back()->with('error', 'Please chose excel file to uplode');
        }

         

    }*/
    public function assignCompany(Request $request){
        
            $input = $request->all();

            print_r($input);dd();
            $this->validate($request,[
              'manager' => 'required'
                ]); 
          $company = CompanyManager::where('client_id', '=', $input['id'])->first();
      $companyManager='';
             $companyManager = new CompanyManager();
            if($company==''){
            $companyManager->user_id = $input['manager'];
            $companyManager->client_id = $input['id'];
            $companyManager->save();

            }else{
              
                CompanyManager::where('client_id', '=', $input['id'])->update(['user_id' =>trim($input['manager'])]);
           
            }
            $managerName = User::findOrFail($input['manager']);
            $companyName = Client::findOrFail($input['id']);
            return redirect()->back()->with('status',  'you have assigned '.ucwords($managerName->first_name).' as Manager to '. $companyName->organization_name.'');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
