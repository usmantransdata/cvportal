<!DOCTYPE html>
  @include('layouts.header')
  @include('layouts.sidebar')

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
								

								<div class="widget-box" style="height: auto;width: auto;">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">Batch Detail</h4>
										<!-- validation widget -->
									<!-- <div class="widget-toolbar">
											<label>
												<small class="green">
													<b>Validation</b>
												</small>

											<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4" />
												<span class="lbl middle"></span>
											</label>
										</div>  -->
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<!-- #section:plugins/fuelux.wizard -->
											<div id="fuelux-wizard" data-target="#step-container">
												<!-- #section:plugins/fuelux.wizard.steps -->
												<ul class="wizard-steps">
													<li data-target="#step1" class="active">
														<span class="step">1</span>
														<span class="title">Btach Detail</span>
													</li>

													<li data-target="#step2">
														<span class="step">2</span>
														<span class="title">Upload Data</span>
													</li>

													<!-- <li data-target="#step3">
														<span class="step">3</span>
														<span class="title">Payment Info</span>
													</li> -->

												</ul>

												<!-- /section:plugins/fuelux.wizard.steps -->
											</div>

											<hr />

											<!-- #section:plugins/fuelux.wizard.container -->
											<div class="step-content pos-rel" id="step-container">
												<div class="step-pane active" id="step1">
													
			 <form action="{{ route('importExcel') }}" class="col-xs-6 col-sm-offset-3 form-horizontal" method="POST" enctype="multipart/form-data" id="validation-form">
           {{ csrf_field() }} 

					                  <div class="form-group">
					                
					                      <input type="hidden" name="company" value="{{$company->id}}">
					                  
					                  </div> 


					                   <div class="form-group">
					                    <label for="batch_name">Batch Name</label>
					                    <input id="batch_name" required="required" name="batch_name" type="text" class="form-control" placeholder="Btach Name">
					                  </div>


					                   <div class="form-group">
					                    <label for="batch_name">Due Date</label>
					                    <input  name="due_date" class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" placeholder="yyyy-dd-mm" required="required"/>
					                  </div>

							          <div class="form-group">
					                    <label for="instructions">Notes</label>
					                    <textarea id="instructions" name="instructions" type="text" class="form-control" placeholder="Special Instructions"></textarea> 
					                  </div>     
					             
					                  
					                 
											</div>
										

												<div class="step-pane" id="step2">
													<div>
					                 
					               <div class="form-group">
					                    <div class="form-group col-md-6">

					                      <input id="excelfile"  type="file" name="import_file" required="required" />
					                  
					                    </div>
					                    <div class="form-group col-md-6">
					                        <a onclick="ExportToTable()" class="btn btn-primary btn-xs">Preview File</a>

					                        <button type="submit" style="margin-left: 10px" class="btn btn-primary btn-xs">Upload</button>
					           
					                    </div>
					                  </div> 
					                  
					      </form>	
				<table id="exceltable" class="table table-striped table-bordered table-hover" style="overflow-y: scroll;height: 700px;display: block;
    width: 984px;overflow-x: scroll;">

                        <thead>
                        
                        </thead>

                        <tbody>
                          
                      </tbody>

                      </table>
					              	</div>
												</div>

												<!-- <div class="step-pane" id="step3">
													<div class="center">
														<h3 class="blue lighter">This is step 3</h3>
													</div>
												</div>

												<div class="step-pane" id="step4">
													<div class="center">
														<h3 class="green">Congrats!</h3>
														Your product is ready to ship! Click finish to continue!
													</div>
												</div> -->
											</div>

											<!-- /section:plugins/fuelux.wizard.container -->
											<hr />
											<div class="wizard-actions" style="margin-top: 100px">
												<!-- #section:plugins/fuelux.wizard.buttons -->
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-next" data-last="Finish">
													Next
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>

												<!-- /section:plugins/fuelux.wizard.buttons -->
											</div>

											<!-- /section:plugins/fuelux.wizard -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->


@include('layouts.footer')
	

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>  

		<!--[if !IE]> -->
	
		<!-- page specific plugin scripts -->
		<script src="{{ asset('/') }}public/aceadmin/assets/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.validate.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/select2.min.js"></script>

		<!-- inline scripts related to this page -->

<script type="text/javascript">  
   function ExportToTable() {  
       var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv)$/;  
       //Checks whether the file is a valid csv file  
       if (regex.test($("#excelfile").val().toLowerCase())) {  
           //Checks whether the browser supports HTML5  
           if (typeof (FileReader) != "undefined") {  
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
                   $('#exceltable').show();  
               }  
              //reader.readAsText($("#csvfile").item(0));
              reader.readAsText($("#excelfile")[0].files[0]);  
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
    <!-- 
<script type="text/javascript">
   function ExportToTable() {  
     var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#excelfile").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) {  
                         BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
                 $('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
             }  
         }  
         else {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else {  
         alert("Please upload a valid Excel file!");  
     }  
 }  


 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
     for (var i = 0; i < jsondata.length; i++) {  
         var row$ = $('<tr/>');  
         for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
             var cellValue = jsondata[i][columns[colIndex]];  
             if (cellValue == null)  
                 cellValue = "";  
             row$.append($('<td/>').html(cellValue));  
         }  
         $(tableid).append(row$);  
     }  
 }  
 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
     var columnSet = [];  
     var headerTr$ = $('<tr/>');  
     for (var i = 0; i < jsondata.length; i++) {  
         var rowHash = jsondata[i];  
         for (var key in rowHash) {  
             if (rowHash.hasOwnProperty(key)) {  
                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                     columnSet.push(key);  
                     headerTr$.append($('<th/>').html(key));  
                 }  
             }  
         }  
     }  
     $(tableid).append(headerTr$);  
     return columnSet;  
 }  
</script> -->


<script type="text/javascript">

	$('.date-picker').datepicker({
    format: 'yyyy-mm-dd',
   // startDate: '-3d'
});
</script>

<script type="text/javascript">
$(document).ready(function() {	
$('#validation-form').validate({
					rules: {	
						batch_name: {
							required: true
						},
						due_date: {
							required: true
						},
					},
					messages: {	
						batch_name: "Please enter batch name",
						due_date: "Please select a due date for this batch"
					},
				});
	});
</script>
		<script type="text/javascript">
			
			$(document).ready(function () {
			$('.btn-next').click(function(event){

				//var $validation = true;
				if($('#validation-form').valid()){
					$('#fuelux-wizard').ace_wizard();
				}
				});
			});
		</script>

</html>


