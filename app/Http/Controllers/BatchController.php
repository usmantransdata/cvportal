<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Client;
use App\User;
use App\OrderBatch;
use App\BatchDetail;
use App\CompanyManager;
use App\CotentBatch;
use Excel;
use Session;
use Auth;
use DB;
use Mail;
use App\Mail\VerifyMail;
use App\VerifyUser;
use App\SalesForceAuthenticate;




class BatchController extends Controller
{

 protected  $text = array();
 
    public function upload(){
       

        if(Auth::check()){
         if(Auth::user()->role_id == 5){
                   $company = Client::where('contact_person_email', '=', Auth::user()->email)->first();
       return view('data.uploaddata', compact('company'));
             }
                else{
                  return redirect()->to('/login');
                }
       }

    }

    public function salesForceTestConnection(){

        return view('sales_force.sales_force_connection');
    }
// after connection redirect to search page

    public function salesForceSearch(){

      
        return view('sales_force.searchBefore');
    }
    //sales force make connection here

    public function salesForceConnection(Request $request){

       
        if(isset($request['save'])){
             $id = Auth::user()->client_id;
       // print_r($id);dd();
             $cred = SalesForceAuthenticate::where('user_id', $id)->get();
            // print_r($cred);dd();
             $msg = '';
             $requestParameter = array();

            if(sizeof($cred)==0){

                $sales_force_authenticate = SalesForceAuthenticate::create([
                'consumerKey' =>  $request['consumerKey'],
                'consumerSecret' => $request['consumerSecret'],
                'user_id' => $id,
                 ]);
                $msg = "Your Credantials Added SuccesFully !";

            }else{
                SalesForceAuthenticate::where('user_id', $id)->update(array('consumerKey' => $request['consumerKey'], 'consumerSecret' => $request['consumerSecret']));
                $msg = "Your Credantials Updated SuccesFully !";
            }
            
        
        return redirect()->back()->with('success', $msg);   

        }elseif (isset($request['sales_force'])) {

           $redirect_uri = 'https://validator.transdata.biz/callback';
         
            $url="https://login.salesforce.com/services/oauth2/authorize?response_type=code&client_id=".$request['consumerKey']."&redirect_uri=".$redirect_uri."";

            return redirect()->to($url);
        }       
    }



    public function getToken(){

            $id = Auth::user()->client_id;

    $sales_force_data = SalesForceAuthenticate::where('user_id', $id)->first();
        //
        return view('sales_force.getToken', compact('sales_force_data'));
    }


   
   public function getTokenValues(Request $request){
    /*echo "<pre>";
    print_r($request->all());dD();*/
    $token_url =  "https://login.salesforce.com/services/oauth2/token";
    $code = $request['code'];

        if (!isset($code) || $code == "") {

           die("Error - code parameter missing from request!");

        }

        $params = "code=" . $code

   . "&grant_type=authorization_code"

   . "&client_id=" . $request['client_id']

   . "&client_secret=" . $request['client_secret']

   . "&redirect_uri=" . urlencode($request['redirect_uri']);

            $curl = curl_init($token_url);

        curl_setopt($curl, CURLOPT_HEADER, false);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_POST, true);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $params);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 200 ) {

   die("Error: call to token URL $token_url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

}

curl_close($curl);

$response = json_decode($json_response, true);

$access_token = $response['access_token'];

$instance_url = $response['instance_url'];

if (!isset($access_token) || $access_token == "") {

   die("Error - access token missing from response!");

}

if (!isset($instance_url) || $instance_url == "") {

   die("Error - instance URL missing from response!");

}

//echo $access_token."<br>". $instance_url;


   $id = Auth::user()->client_id;

    $sales_force_code = SalesForceAuthenticate::where('user_id', $id)->first();

    if(sizeof($sales_force_code) > 0){
            $sales_force_code->update([
                'access_token'=> $access_token,
                'signature'=> $response['signature'],
                'id_token'=> $response['id_token'],
                'instance_url'=> $instance_url,
                'url_id'=> $response['id'],
                'issued_at'=> $response['issued_at']
            ]);
   }

   return redirect()->to('getToken')->with('success', 'Database Updated!');

}   
    
    public function ssfd(){

           $id = Auth::user()->client_id;

           $sales_force_data = SalesForceAuthenticate::where('user_id', $id)->first();

             $query = "SELECT Id, FirstName, LastName, Email, Phone, Title, Department FROM Contact";

           $url = "". $sales_force_data['instance_url']."/services/data/v20.0/query?q=" . urlencode($query);

           $curl = curl_init($url);

           curl_setopt($curl, CURLOPT_HEADER, false);

           curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

           curl_setopt($curl, CURLOPT_HTTPHEADER,

                   array("Authorization: OAuth ". $sales_force_data['access_token'].""));

           $json_response = curl_exec($curl);

           curl_close($curl);

           $response = json_decode($json_response, true);


          return view('sales_force.search', compact('response'));

    }

    public function updateSalesforce($id){
       // echo $id;dd();
        $user_id = Auth::user()->client_id;
        $sales_force_data = SalesForceAuthenticate::where('user_id', $user_id)->first();

  

 $content_batch = CotentBatch::where('batch_id', $id)->get();

 foreach ($content_batch as $value) {
    $url = "". $sales_force_data['instance_url']."/services/data/v20.0/sobjects/Contact/". $value['sf_id']."";
  /* echo "<pre>";
print_r($url);*/
    $json = array("Validation__c" => $value['validation'], "Disposition__c" => $value['disposition'], "Is_Email_Verifield__c" => $value['is_email_verified']);

    $content = json_encode($json);
   
   $curl = curl_init($url);

   curl_setopt($curl, CURLOPT_HEADER, false);

   curl_setopt($curl, CURLOPT_HTTPHEADER,

           array("Authorization: OAuth ". $sales_force_data['access_token']."",

               "Content-type: application/json"));

   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PATCH");

   curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

   curl_exec($curl);

   $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

   if ( $status != 204 ) {

       die("Error: call to URL $url failed with status $status, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

   }

   //echo "HTTP status $status updating account<br/><br/>";

   curl_close($curl);
 }
 
   
   return redirect()->back()->with('message', 'Sales Force Contacts Updated');

    }


    //sales force batch 

    public function salesForce(){

        $id = Auth::user()->client_id;

        $sales_force = SalesForceAuthenticate::where('user_id', $id)->first();
        if(is_null($sales_force)){
           return view('sales_force.index');
        }
        else
        {
            return view('sales_force.searchbefore');
        }
       
    }
    public function saveBatchData(Request $request){
       $input =  $request->all();

            
//print_r($input);dd();
            $if_exist = CotentBatch::where('sf_id', $input['Id'])->get();
            if(sizeof($if_exist) == 0 ){
               $content_batch = CotentBatch::create([
                'batch_id' => 0, 
                'sf_id' => $input['Id'],
                'first_name' => $input['FirstName'], 
                'last_name' => $input['LastName'], 
                'company_name' => $input['Department'], 
                'title' => $input['Title'], 
                'email1' => $input['Email'], 
                'phone_number1' => $input['Phone'], 
                'phone_number2' => $input['Phone'], 
                'address1' => '', 
                'city' => '', 
                'state' => '', 
                'zip' => '', 
                'country' => '', 

            ]);
               return $content_batch;
            }else
            {
             $content_batch =   CotentBatch::where('sf_id', $input['Id'])->update(array(
                    'batch_id' => 0,
                    'sf_id' => $input['Id'],
                     'first_name' => $input['FirstName'], 
                    'last_name' => $input['LastName'], 
                    'company_name' => $input['Department'], 
                    'title' => $input['Title'], 
                    'email1' => $input['Email'], 
                    'phone_number1' => $input['Phone'], 
                    'phone_number2' => $input['Phone'], 
                    'address1' => '', 
                    'city' => '', 
                    'state' => '', 
                    'zip' => '', 
                    'country' => '',

                ));

       
              return $content_batch;
            }
           
  
    }
    public function orderBatch(){
       // echo "string";dd();
         $company = Client::where('contact_person_email', '=', Auth::user()->email)->first();
        return view('sales_force.order_batch', compact('company'));
    }

    public function salesForceBatch(Request $request){
        $input = $request->all();
        $id = Auth::user()->id;
        $tmp = 0;
        if(isset($input['validate_email'])){
        if($input['validate_email'] == 'on'){
                $tmp = 1;
                    }
                    else{
                        $tmp=0;
                    }
                    }
                   
        $order_batch = BatchDetail::create([
                    'uploader_id' => $id,
                    'client_id' => $input['company'],
                    'batch_process_bit' => 1,
                    'batch_name' => $input['batch_name'],
                    'status_id' => 1,
                    'is_sales_force' => 1,
                    'is_email_verified' => $tmp,
                    'instructions' => $input['instructions'],
                    'due_date' => $input['due_date'],
        ]);
                   
         
                
                  
        $content_batch = CotentBatch::where('batch_id', 0)->update(array('batch_id' => $order_batch->id));
    
        BatchDetail::where('id', $order_batch->id)->update(array('total_record_count' => $content_batch));
       
        return redirect()->to('viewData');


    }
    public function delBatch(Request $request)
    {

         $batchDetail = BatchDetail::findOrFail($request['batch_id']);
         $batchDetail->delete();
         $orderBatch = CotentBatch::where('batch_id', '=', $request['batch_id'])->delete();
            
        return redirect()->to('/login');
    }

    public function batchFullView($id){

            $content_batch = CotentBatch::where('batch_id', '=', $id)->get();

            return view('data.batch_full_view', compact('content_batch'));
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

    public function updateBatch(Request $request, $id){

        $batch_detail = BatchDetail::find($id);
        $batch_detail->batch_name = $request['batch_name'];
        $batch_detail->instructions = $request['notes'];
        $batch_detail->due_date = $request['due_date'];
        $batch_detail->save();


        return redirect()->to('viewData')->with('edit_message', 'You have successfully edit the batch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $batchEdit = BatchDetail::find($id);
       return view('data.batch_edit', compact('batchEdit'));
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
