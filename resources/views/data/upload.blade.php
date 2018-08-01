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
                            @if(auth::user()->role_id == 5)
                              
                              <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse">
                            <script type="text/javascript">
                              try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                            </script>

                                    <ul class="nav nav-list">
                                      <li class="hover">
                                        <a href="{{route('viewData')}}">
                                          <i class="menu-icon fa fa-tachometer"></i>
                                          <span class="menu-text"> Dashboard </span>
                                        </a>

                                        <b class="arrow"></b>
                                      </li>

                                      <li class="active open hover">
                                        <a href="{{route('data_upload')}}">
                                           <i class="menu-icon fa fa-cog"></i>
                                          <span class="menu-text"> Upload Data </span>

                                          <b class="arrow fa fa-angle-down"></b>
                                        </a>
                                      </li>
                                      
                                     
                                      <li class="open hover">
                                       <a href="{{route('salesForceTestConnection')}}">
                                           <i class="menu-icon fa fa-cloud bigger-170 "></i>
                                         <span class="menu-text"> Sales Force Connection</span>

                                         <b class="arrow fa fa-angle-down"></b>
                                       </a>
                                     </li>

                                       <li class="open hover">
                                       <a href="{{route('salesForce')}}">
                                           <i class="menu-icon fa fa-cloud bigger-170 "></i>
                                         <span class="menu-text"> Sales Force Batch</span>

                                         <b class="arrow fa fa-angle-down"></b>
                                       </a>
                                     </li>
                                     
                                    </ul>
                                  </li>
                                </ul>
                              </li>
                              </li>
                       </ul><!-- /.nav-list -->

                            <!-- #section:basics/sidebar.layout.minimize -->
                            <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                              <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                            </div>
                              <!-- /section:basics/sidebar.layout.minimize -->
                            <script type="text/javascript">
                              try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                            </script>
                          </div>
              @endif
              <div class="page-content">
                  <div class="page-header">
                    <h1>
								Upload Data
								
							</h1>
					</div><!-- /.page-header -->
<form class="form-horizontal" method="POST" action="{{route('readcsv')}}" enctype="multipart/form-data" >
	{{ csrf_field() }}
                                
                                
                                
	<input type="hidden" name="company" value="{{$company->id}}">
						<div class="row">
							<div class="col-xs-12">
								<div class="container">
								  
								<div class="stepwizard col-md-offset-2">
								    <div class="stepwizard-row setup-panel">
								      <div class="stepwizard-step">
								        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
								        <p>Batch Detail</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
								        <p>Upload And Preview</p>
								      </div>
								      <div class="stepwizard-step">
								        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
								        <p>Match Fields</p>
								      </div>
								       <div class="stepwizard-step">
								        <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
								        <p>Finish</p>
								      </div>
								    </div>
								  </div>
						  
								  <div class="row setup-content" id="step-1">
								      <div class="col-xs-6 col-md-offset-3">
								        <div class="col-md-12">
								          <h3> Batch Detail</h3>
								          <div class="form-group">
								            <label class="control-label">Batch Name</label>
								            <input  maxlength="100" type="text" class="form-control" id="batch_name" required="required" name="batch_name" placeholder="Enter Batch Name"  />
								          </div>
								          <div class="form-group">
								            <label class="control-label">due date</label>
								            <input name="due_date" maxlength="100" type="text" class="form-control date-picker" id="id-date-picker-1" data-date-format="dd-mm-yyyy" placeholder="yyyy-dd-mm" required="required"/>
								          </div>
								          <div class="form-group">
								            <label class="control-label">Special Notes</label>
								            <textarea id="instructions" name="instructions" type="text" class="form-control" placeholder="Special Instructions" cols="10" rows="5"></textarea>
								          </div>
								          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
								        </div>
								      </div>
								    </div>
								    <div class="row setup-content" id="step-2">
								      <div class="col-xs-6 col-md-offset-3">
								        <div class="col-md-12">
								          <h3> Upload & Preview</h3>
								          <span class="text-info">
								          	<a href="{{url('sample-csv')}}">
								          	Download Sample CSV File</a>
								          </span>
								          <br>
								          <br/>
			               <div class="panel panel-default">
			                   <div class="panel-heading">CSV Import</div>
			                   <div class="panel-body">
			                          
			                           <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
			                               <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

			                               <div class="col-md-6">
			                                   <input id="csv_file" type="file" class="form-control" name="csv_file" required>

			                                   @if ($errors->has('csv_file'))
			                                       <span class="help-block">
			                                       <strong>{{ $errors->first('csv_file') }}</strong>
			                                   </span>
			                                   @endif
			                               </div>
			                           </div>

			                           <div class="form-group">
			                               <div class="col-md-6 col-md-offset-4">
			                                   <div class="checkbox">
			                                       <label>
			                                           <input type="checkbox" name="header" checked> File contains header row?
			                                       </label>
			                                       <a onclick="ExportToTable()" class="btn btn-primary btn-xs previewbtn">Preview File</a>
			                                   </div>
			                               </div>
			                           </div>
			                   </div>
			               </div>
			           					          	


								          <button class="submitfile btn btn-primary nextBtn btn-lg pull-right" type="submit" >Next</button>
								        </div>
								      </div>
								       <table id="exceltable" class="col-xs-10 col-md-offset-0 table table-striped table-bordered table-hover" style="overflow-y: scroll;height: 600px;display: block;
								    width: 100%;overflow-x: scroll;">
										<thead>
										</thead>
										<tbody>
										</tbody>
										</table>
								    </div>
								    <div class="row setup-content" id="step-3">
								    
								    </div>
								 <!--  </form> -->
								  <div class="row setup-content" id="step-4">
								      <div class="col-xs-6 col-md-offset-3">
								        <div class="col-md-12">
								          <h3> Batch Detail</h3>
								          
								          <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Finish</button>
								        </div>
								      </div>
								    </div>
								</div>
							<!-- multi step wizard form ends here -->
							</div> <!-- /.col xs-12 -->
						</div><!-- /.row -->
					</form>	
                 
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-container -->


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

		<!--[if !IE]> -->
	
		<!-- page specific plugin scripts -->
		<script src="{{ asset('/') }}public/aceadmin/assets/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.validate.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/select2.min.js"></script>

		<!-- inline scripts related to this page -->

		<!-- import csv and preview -->
<script type="text/javascript">  
   function ExportToTable() {  

       var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv)$/;  
       //Checks whether the file is a valid csv file  
       if (regex.test($("#csv_file").val().toLowerCase())) {  
           //Checks whether the browser supports HTML5  
           if (typeof (FileReader) != "undefined") {  
           
           	$("#exceltable").show();
           	$(".previewbtn").hide();
               var reader = new FileReader();  
               reader.onload = function (e) {  
                   var table = $("#exceltable > tbody");  
                   //Splitting of Rows in the csv file  
                   var csvrows = e.target.result.split("\n");  
                   for (var i = 0; i < csvrows.length; i++) {  
                       if (csvrows[i] != "") {  
                           var row = "<tr>";  
                           var csvcols = csvrows[i].split(",");  
                           //Looping through each cell in a csv row  
                           for (var j = 0; j < csvcols.length; j++) {  
                               var cols = "<td>" + csvcols[j] + "</td>";  
                               row += cols;  
                           }  
                           row += "</tr>";  
                           table.append(row);  
                       }  
                   }  
                   $('#exceltable').show();                 }  
              //reader.readAsText($("#csvfile").item(0));
              reader.readAsText($("#csv_file")[0].files[0]);  
           }  
           else {  
               alert("Sorry! Your browser does not support HTML5!");  
           }  
       }  
       else {  
           alert("Please upload a valid CSV file!");  
       }  
   } 

    </script>
    <!-- multi step wizard -->

<script type="text/javascript">
    	$(document).ready(function () {
    		$(".previewbtn").show();
    		$( ".submitfile" ).on( "click", function() {
    			$("#exceltable").hide();	
    		});
    	  var navListItems = $('div.setup-panel div a'),
    	          allWells = $('.setup-content'),
    	          allNextBtn = $('.nextBtn');

    	  allWells.hide();

    	  navListItems.click(function (e) {
    	      e.preventDefault();
    	      var $target = $($(this).attr('href')),
    	              $item = $(this);

    	      if (!$item.hasClass('disabled')) {
    	          navListItems.removeClass('btn-primary').addClass('btn-default');
    	          $item.addClass('btn-primary');
    	          allWells.hide();
    	          $target.show();
    	          $target.find('input:eq(0)').focus();
    	      }
    	  });

    	  allNextBtn.click(function(){
    	      var curStep = $(this).closest(".setup-content"),
    	          curStepBtn = curStep.attr("id"),
    	          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
    	          curInputs = curStep.find("input[type='text'],input[type='url']"),
    	          isValid = true;

    	      $(".form-group").removeClass("has-error");
    	      for(var i=0; i<curInputs.length; i++){
    	          if (!curInputs[i].validity.valid){
    	              isValid = false;
    	              $(curInputs[i]).closest(".form-group").addClass("has-error");
    	          }
    	      }

    	      if (isValid)
    	          nextStepWizard.removeAttr('disabled').trigger('click');
    	  });

    	  $('div.setup-panel div a.btn-primary').trigger('click');
    	});
    </script>
    <!-- ends here-->

<script type="text/javascript">

	$('.date-picker').datepicker({
    format: 'yyyy-mm-dd',
   // startDate: '-3d'
});
</script>
</html>


