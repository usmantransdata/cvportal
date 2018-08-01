<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


	Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {


Route::fallback(function(){
    return 'Sorry you could not reach this page';
})->name('fallback');

Route::post('userActivate', 'AdminController@userActivate')->name('userActivate');	


Route::post('import_parse', 'ClientController@parseImport')->name('import_parse');




Route::get('import_import', function(){

	echo "string";dd();
})->name('import_import');


Route::post('import_process', 'ClientController@processImport')->name('import_process');

Route::post('getconttentbatch', 'ClientController@get_contentbatch_columns')->name('getconttentbatch');
Route::post('storecsvfile', [
    'as' => 'storecsvfile',
    'uses' => 'ClientController@importcsv'
]);


Route::post('user_signup', 'AdminController@signup')->name('user_signup');

Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::post('readcsv', 'ClientController@readcsv')->name('readcsv');

Route::get('user', 'AdminController@addUsers')->name('user');

Route::get('userView', 'AdminController@userView')->name('userView');

Route::get('client.view', 'ClientController@view')->name('client.view');

Route::get('data_upload', 'BatchController@upload')->name('data_upload');


Route::post('importExcel', 'ClientController@importExcel')->name('importExcel');

Route::get('batchFullView/{id}', 'BatchController@batchFullView')->name('batchFullView');

Route::get('batchEdit/{id}', 'BatchController@show')->name('batchEdit');

Route::post('updateBatch/{id}', 'BatchController@updateBatch')->name('updateBatch');

Route::resource('client', 'ClientController');

Route::get('clientFullView/{id}', 'ClientController@clientFullView')->name('clientFullView');

Route::get('getUsers' , 'AdminController@getUsers')->name('getUsers');


Route::get('viewData' , 'BatchDetailController@index')->name('viewData');

Route::get('delBatch', 'BatchController@delBatch')->name('delBatch');

Route::post('batchDetail', 'BatchDetailController@store')->name('batchDetail');

Route::get('userEdit/{id}', 'AdminController@edit')->name('userEdit');

Route::get('userDel', 'AdminController@destroy')->name('userDel');

Route::post('usersUpdate/{id}', 'AdminController@update')->name('usersUpdate');


Route::post('assign-company', 'ClientController@assignCompany')->name('assign-company');

Route::post('statusChanged', 'BatchDetailController@statusChanged')->name('statusChanged');

Route::get('statusChangedManager/{id}', 'BatchDetailController@statusChangedManager')->name('statusChangedManager');


Route::get('download-csv/{id}', function ($id) {

//echo "string";dd();
	$batch = \App\CotentBatch::where('batch_id', '=', $id)->get();
	//print_r($id);dd();
	$csvExporter = new \Laracsv\Export();
	$batch_detail = \App\BatchDetail::find($id);

	
	if($batch_detail->is_email_verified == 0){
	return $csvExporter->build($batch, ['id', 'batch_id', 'first_name', 'last_name', 'company_name', 'title', 'email1', 'email2', 'email3', 'phone_number1', 'phone_number2', 'phone_number3', 'address1', 'address2', 'address3', 'city', 'state', 'zip', 'country', 'disposition', 'validation'])->download();
	}
	else{
		return $csvExporter->build($batch, ['id', 'batch_id', 'first_name', 'last_name', 'company_name', 'title', 'email1', 'email2', 'email3', 'phone_number1', 'phone_number2', 'phone_number3', 'address1', 'address2', 'address3', 'city', 'state', 'zip', 'country', 'disposition', 'validation', 'is_email_verified'])->download();
	}
});

Route::get('organization_name_check', function(){

	$user = DB::table('client')->pluck('organization_name');
	return $user;
	//print_r($user);dd();
})->name('organization_name_check');

Route::get('email_check', function(){

	$user = DB::table('users')->pluck('email');
	return $user;
	//print_r($user);dd();
})->name('email_check');

Route::get('download-csv-client/{id}', function ($id) {

//echo "string";dd();
	$batch = \App\CotentBatch::where('batch_id', '=', $id)->get();
	//print_r($batch);dD();
	$csvExporter = new \Laracsv\Export();

	return $csvExporter->build($batch, ['first_name', 'last_name', 'company_name', 'title', 'email1', 'email2', 'email3', 'phone_number1', 'phone_number2', 'phone_number3', 'address1', 'address2', 'address3', 'city', 'state', 'zip', 'country', 'disposition', 'validation'])->download();

});

Route::get('sample-csv', function(){
	$file = storage_path('/app/demo/sample_upload_file.csv');
	return response()->download($file);
});

Route::get('completedBatch/{id}', 'ClientController@completedBatch')->name('completedBatch');

Route::get('data.compare', function () {
				$company = \App\BatchDetail::get();
			return view('data.compare', compact('company'));
});

Route::post('compareFiles', 'ClientController@compareFiles')->name('compareFiles');


Route::get('uploadGoodRecords/{id}', 'ClientController@uploadGoodRecords')->name('uploadGoodRecords');

Route::get('salesForce', 'BatchController@salesForce')->name('salesForce');

Route::post('salesForceConnection', 'BatchController@salesForceConnection')->name('salesForceConnection');

Route::get('salesForceSearch', 'BatchController@salesForceSearch')->name('salesForceSearch');

Route::get('/callback', function()
{
	
	$id = Auth::user()->client_id;

	$sales_force_code = App\SalesForceAuthenticate::where('user_id', $id)->first();

	if(sizeof($sales_force_code) > 0 && isset($_GET['code']) && strlen($_GET['code'])>0){

			$sales_force_code->update([
				'code'=> $_GET['code']
			]);
	return redirect()->to('getToken')->with('code', $_GET['code']);
	} 
	else{

		print_r($request->all());dd("dsd");
		//return redirect()->to('tokenResult')->with('code', $_GET['code']
	}
});
Route::get('ssfd', 'BatchController@ssfd')->name('ssfd');

Route::get('updateSalesforce/{id}', 'BatchController@updateSalesforce')->name('updateSalesforce');

Route::get('getToken', 'BatchController@getToken')->name('getToken');

Route::post('getTokenValues', 'BatchController@getTokenValues')->name('getTokenValues');

Route::get('search_result', function(){

	$search_result = Forrest::query("SELECT Id, FirstName, LastName, Email, Phone, Title, Department FROM Contact");

	/*echo "<pre>";
	print_r($test['records'][0]);dd();*/
	return view('sales_force.search' , compact('search_result'));
});


/*Route::get('testconnection', function()
{
    	return Forrest::authenticate();
});*/

Route::get('salesForceTestConnection', 'BatchController@salesForceTestConnection')->name('salesForceTestConnection');
Route::get('orderBatch', 'BatchController@orderBatch')->name('orderBatch');
Route::post('saveBatchData', 'BatchController@saveBatchData')->name('saveBatchData');
Route::post('salesForceBatch', 'BatchController@salesForceBatch')->name('salesForceBatch');

});

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/user/forgotPassword/{token}', 'Auth\ForgotPasswordController@forgotPassword');

Route::get('setPassword/{id}', 'Auth\RegisterController@setPassword')->name('setPassword');

Route::post('savePassword', 'Auth\RegisterController@savePassword')->name('savePassword');

Route::post('retrivePassword', 'Auth\ForgotPasswordController@retrivePassword')->name('retrivePassword');
