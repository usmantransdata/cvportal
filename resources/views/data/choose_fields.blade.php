<!DOCTYPE html>
  @include('layouts.header')
 

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
					<!-- /section:settings.box -->
	 <body class="no-skin">
          <div class="main-container" id="main-container">
            <script type="text/javascript">
              try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
              <div class="page-content">
                <div class="page-content-area">
                  <div class="page-header">
                    <h1>
								Upload Data
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="container">
								<div class="stepwizard col-md-offset-4">
								    <div class="stepwizard-row setup-panel">
								      <div class="stepwizard-step">
								        <a href="#step-1" type="button" class="btn btn-default btn-circle" disabled="disabled">1</a>
								        <p>Batch Detail</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
								        <p>Upload And Preview</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-3" type="button" class="matchfilds btn btn-primary btn-circle" >3</a>
								        <p>Match Fields</p>
								      </div>
								       <div class="stepwizard-step">
								        <a href="#step-4" type="button" class="laststep btn btn-default btn-circle" disabled="disabled">4</a>
								        <p>Finish</p>
								      </div>
								    </div>

								  </div>
						  
								  <div class="stepwizard col-md-offset-4" >
								  	
								

								 <div class="panel panel-default matchfilds_content">   
   
							<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
							    {{ csrf_field() }}
                                <input type="hidden" name='filename' value="{{$filename}}"> 
                                <input type="hidden" name='batch_name' value="{{$batch_name}}"> 
                                <input type="hidden" name='due_date' value="{{$due_date}}"> 
                                <input type="hidden" name='instructions' value="{{$instructions}}"> 
                                <input type="hidden" name='header' value="{{$header}}"> 
                                <input type="hidden" name="company" value="{{$company}}">
                                <input type="hidden" name="totalcounts" value="{{$totalcounts}}">

							    <table class="table">
							    	@foreach ($tablecolums as $key => $value)
							    	   @if($value!='id' && $value!='batch_id' && $value!='address3' && $value!='health_status' && $value!='disposition' && $value!='validation' && $value!='created_date' && $value!='updated_date')
							    	   
							                 <tr><td>{{ucfirst(str_replace('_', ' ', $value))}}:</td><td>
                                               <select name="{{ $value }}">
                                               	@foreach ($csv_header_fields as $db_field)
							                            <option value="{{ $db_field }}">{{ $db_field }}</option>
							                        @endforeach

                                               </select>

							                 </td></tr>
                                        @endif

							        @endforeach
							      
							       	
							       
							    </table>

							   
						</div>
						<div class="panel panel-default laststep_content" style="display:none;padding: 10px">
									
                                 <p class""><b>Batch Name: </b>{{$batch_name}}</p>
                                 <p class""><b>Proposed Due Date: </b>{{$due_date}}</p>
                                 <p class""><b>Total Count: </b>{{$totalcounts}}</p>
                                 <p class="text-primary"><b>Are you sure you want to upload this batch ?</b></p>
                                 <p>
                                 <button type="submit" class="btn btn-success">
							        Finish
							    </button>	
							     <a href="{{url('viewData')}}" class="btn btn-danger">
							        Cancel
							    </a>

                                 </p>
								</div>   
						 <button type="button" class="btn btn-primary importdata">
							       Import Data
							    </button>
							    
							</form>
						</div>
						<div class="stepwizard col-md-offset-2 finish" >
							

						</div>
								</div><!-- /.container -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->


@include('layouts.footer')
<style type="text/css">

.stepwizard-step p {
    margin-top: 10px;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 50%;
    position: relative;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}	
</style>	

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>  
<script type="text/javascript">
    	$(document).ready(function () {
    		$( ".importdata" ).on( "click", function() {
            $( ".matchfilds" ).removeClass("btn-primary");
            $( ".laststep" ).addClass("btn-primary");
            $( ".matchfilds" ).addClass("btn-default");
            
            $( ".matchfilds_content" ).hide();
            $( ".importdata" ).hide();
            $( ".laststep_content" ).show();

            

    			
    			
    		});
    	});
 </script>   		
</html>


