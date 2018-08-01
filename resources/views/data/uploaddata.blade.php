
<!DOCTYPE html>
  @include('layouts.header')

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
 <meta name="_token" content="{{ csrf_token() }}" />
					<!-- /section:settings.box -->
	 <body class="no-skin">
          <div class="main-container" id="main-container">
            <script type="text/javascript">
              try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
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
              <div class="page-content">
                <div class="page-content-area">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							
								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat" >
										<h4 class="widget-title darker">Client upload CSV</h4>

										
									</div>

									<div class="widget-body">
										<div class="widget-main">
											<!-- #section:plugins/fuelux.wizard -->
											<div id="fuelux-wizard" data-target="#step-container">
												<!-- #section:plugins/fuelux.wizard.steps -->
												<ul class="wizard-steps">
													<li data-target="#step1" class="active">
														<span class="step">1</span>
														<span class="title">Batch Detail</span>
													</li>

													<li data-target="#step2">
														<span class="step">2</span>
														<span class="title">Upload</span>
													</li>

													<li data-target="#step3">
														<span class="step">3</span>
														<span class="title">Preview</span>
													</li>

													<li data-target="#step4">
														<span class="step">4</span>
														<span class="title">Match Fields</span>
													</li>
													<li data-target="#step5">
														<span class="step">5</span>
														<span class="title">Finish</span>
													</li>
												</ul>

												<!-- /section:plugins/fuelux.wizard.steps -->
											</div>

											<hr />

	{!! Form::open(
    array(
        'route' => 'import_process', 
        'class' => 'form-horizontal', 
        'id' => 'validation-form',
        'onsubmit'=>'getPath()',
        'novalidate' => 'novalidate', 
        'files' => true)) !!}
									
											<!-- #section:plugins/fuelux.wizard.container -->
											<div class="step-content pos-rel" id="step-container">
												<div class="step-pane active" id="step1">
													<h3 class="lighter block green">Enter the following information</h3>

											

												<div class="form-group">
									            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Batch Name</label>
									            <div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													<input type="hidden" name="company" value="{{$company->id}}">
									            <input  maxlength="100" type="text" class="col-xs-12 col-sm-5" id="batch_name" required="required" name="batch_name" placeholder="Enter Batch Name"  />
									            </div></div>
									          </div>

									          <div class="form-group">
									            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name"></label>
									            <div class="col-xs-12 col-sm-9">
												<div class="clearfix">
													<input type="checkbox" name="validate_email" id="id-file-format" class="ace">
															<span class="lbl"> Validate Email</span>
									            </div></div>
									          </div>
									          <!-- 
									          	<label>
															<input type="checkbox" name="validate_email" id="id-file-format" class="ace">
															<span class="lbl"> Validate Email</span>
												</label> -->
								         
									          <div class="form-group">
									            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Batch Due Date</label>
									            <div class="col-xs-12 col-sm-9">
												<div class="clearfix">
									            <input name="due_date" maxlength="100" type="text" class="col-xs-12 col-sm-5 date-picker" id="id-date-picker-1" data-date-format="dd-mm-yyyy" placeholder="yyyy-dd-mm" required="required"/>
									            </div></div>
									          </div>
								          
									          <div class="form-group">
									            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Special Notes</label>
									            <div class="col-xs-12 col-sm-9">
												<div class="clearfix">
									            <textarea id="instructions" name="instructions" type="text" class="col-xs-12 col-sm-5" placeholder="Special Instructions" cols="10" rows="5"></textarea>
									        </div></div>
									          </div>
														
												<div class="hr hr-dotted"></div>

													
														
													
												</div>

												<div class="step-pane" id="step2">
													<div>

                                                    <div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Custom File Input</h4>

													<div class="widget-toolbar">
														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														<a href="#" data-action="close">
															<i class="ace-icon fa fa-times"></i>
														</a>
													</div>
												</div>

												<div class="widget-body">
													<div class="widget-main">
														<div class="form-group">
															<div class="col-xs-12">
																<!-- #section:custom/file-input -->
																<label class="ace-file-input">
																	<input required="" type="file" name="result_file" id="result_file" />
																	<span class="ace-file-container " data-title="Change" style="display: none;"><span class="ace-file-name"><i class=" ace-icon fa fa-file"></i></span></span><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
															</div>
														</div>
													
														
													</div>
												</div>
											</div>


														
														<input type="hidden"  id="csvdatafile" name="csvdatafile" value="" />
														
														<input type="hidden"  id="csvdata" name="csvdata" value="" />
														<input type="hidden"  id="csvcols" name="csvcols" value="" />
													</div>
												</div>

												<div class="step-pane" id="step3">
													<div class="center">
														<table id="exceltable" class="col-xs-10 col-md-offset-0 table table-striped table-bordered table-hover" style="overflow-y: scroll;height: 600px;display: block;
								    width: 100%;overflow-x: scroll;">
										<thead>
										</thead>
										<tbody>
										</tbody>
										</table>
													</div>
												</div>

												<div class="step-pane" id="step4">
													<div class="center">
														<h3 class="green">Match Fields!</h3>
														<div >
															<center>
															<table class="matchfields_data"></table>
															</center>

														</div>
													</div>
												</div>
												<div class="step-pane" id="step5">
													<div class="center">
														<h3 class="green">Match Fields</h3>
														<p class""><b>Batch Name: </b><span class="batchname"></span></p>
                                 <p class""><b>Proposed Due Date: </b><span class="due_date"></span></p>
                                 <p class""><b>Total Count: </b><span class="totalcounts"></span></p>
                                 <p class="text-primary"><b>Are you sure you want to upload this batch ?</b></p>
                                 <p>
                               <!--   <button type="submit" class="btn btn-success">
							        Finish
							    </button>	 -->
							     <a href="{{url('viewData')}}" class="btn btn-danger">
							        Cancel
							    </a>

                                 </p>
													</div>
												</div>

											</div>
 										</form>
											<!-- /section:plugins/fuelux.wizard.container -->
											<hr />
											<div class="wizard-actions">
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

								
								</div><!-- PAGE CONTENT ENDS -->
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
		<script src="{{ asset('/') }}public/aceadmin/assets/js/bootbox.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.maskedinput.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/ace-elements.min.js"></script>
		<script src="{{ asset('/') }}public/aceadmin/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
<script type="text/javascript">  
	var tmparr=[];
	var csvdata=[];
	var totalcounts=0;
	var lines = [];
   function ExportToTable() {  
       var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv)$/;  
       //Checks whether the file is a valid csv file  
       if (regex.test($("#result_file").val().toLowerCase())) {  
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
                           var tarr = [];
                           //Looping through each cell in a csv row  
                           for (var j = 0; j < csvcols.length; j++) {  
                               var cols = "<td>" + csvcols[j] + "</td>";  
                               csvdata[i]=csvcols[j];	
                               
                               if(i==0)
                               {
                               tmparr.push(csvcols[j]);	
                               }
                               else{
                               	tarr.push(csvcols[j]);
                               }
                               row += cols;  
                           } 
                          lines.push(tarr); 
                          
                           row += "</tr>";  
                           table.append(row);  
                       }
                       totalcounts++;
                   }
                   csvdata=lines;
                  // console.log(lines);  
                  // $("#csvdata").val(lines);
                   $('#exceltable').show();  
                   
               }  
              //reader.readAsText($("#csvfile").item(0));
              reader.readAsText($("#result_file")[0].files[0]);  
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
   

<script type="text/javascript">
	$('.date-picker').datepicker({
    format: 'yyyy-mm-dd',
   // startDate: '-3d'
});
</script>

<script type="text/javascript">
			jQuery(function($) {
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
				$('#result_file , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false 
				});
				
				$('#id-input-file-3').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'small'
					,
					preview_error : function(filename, error_code) {
					}
			
				}).on('change', function(){

				});
				
			
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop CSV file here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["csv"];
						whitelist_mime = ["text/csv"];
					}
					else {
						btn_choose = "Drop CSV file here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = ["csv"];
						whitelist_mime = ["text/csv"];
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						
					});
				
				});
			
			
			});
		</script>
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				$('[data-rel=tooltip]').tooltip();
				
			
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = true;
				$('#fuelux-wizard')
				.ace_wizard({
					//step: 2 //optional argument. wizard will jump to step "2" at first
				})
				.on('change' , function(e, info){
					if(info.step == 2 ) {
					//e.preventDefault();
				    var extension = $('#result_file').val().split('.').pop().toLowerCase();
				    if ($.inArray(extension, ['csv']) == -1) {
				        $('#errormessage').html('Please Select Valid File... ');
				    } else {
				        var file_data = $('#result_file').prop('files')[0];
				        var supplier_name = $('#supplier_name').val();
				        var form_data = new FormData();
				        form_data.append('file', file_data);
				        form_data.append('supplier_name', supplier_name);
				        $.ajaxSetup({
				            headers: {
				                'X-CSRF-Token': $('meta[name=_token]').attr('content')
				            }
				        });
        				$.ajaxSetup({
			            	        headers: {
			            	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			            	        }
			            	    });
				        $.ajax({
				            url: "{{url('storecsvfile')}}", // point to server-side PHP script
				            data: form_data,
				            type: 'POST',
				            contentType: false, // The content type used when sending data to the server.
				            cache: false, // To unable request pages to be cached
				            processData: false,
				            success: function(data) {
				            	$("#csvdatafile").val(data);
				            	ExportToTable();
				            }
				        });
				    }	
                      
					}
					if(info.step == 5 ) {
					}
					if(info.step == 3 ) {
                      url = '{{route("getconttentbatch")}}';
			            $.ajax({
			                url: url,
			                data: {"_token": "{{ csrf_token() }}", "csvcolumns":tmparr},
			                type: "POST",
			                
			                success : function(response){
                             $('.matchfields_data').html(response);
                             
                             $('.totalcounts').html(totalcounts);
                             $('.due_date').html($("#id-date-picker-1").val());
                             $('.batchname').html($("#batch_name").val());
			                },
			                error : function(res){
			                	alert(res);
			                 console.log(res);
			                }
			            });
					}
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
					}
				})
				.on('finished', function(e) {
					$("#csvcols").val(tmparr);
					url = '{{route("import_process")}}';
			            	$.ajaxSetup({
			            	        headers: {
			            	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			            	        }
			            	    });
			            $.ajax({
			                url: url,
			                                
			                data:$('#validation-form').serialize(),
			                type: "POST",
			                
			                success : function(response){
                             window.location.href = "/viewData";
                              },
			               
			                error : function(res){
			                	alert(res);
			                  console.log(res);
			                }
			            });
			           return false; 
					bootbox.dialog({
						message: "Thank you! Your information was successfully saved!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick', function(e){
					//e.preventDefault();//this will prevent clicking and selecting steps
				});
			
			
				//jump to a step
				$('#step-jump').on('click', function() {
					var wizard = $('#fuelux-wizard').data('wizard')
					wizard.currentStep = 3;
					wizard.setState();
				})
				//determine selected step
				//wizard.selectedItem().step
			
			
			
				//hide or show the other form which requires validation
				//this is for demo only, you usullay want just one form in your application
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('show');
						$('#sample-form').hide();
					}
				})
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				//$.mask.definitions['~']='[+-]';
				//$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						email: {
							required: true,
							email:true
						},
						
						name: {
							required: true
						},
						
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						
						name: "Please choose state"
						
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});

				$('#modal-wizard .modal-header').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				
				/**
				$('#date').datepicker({autoclose:true}).on('changeDate', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				
				$('#mychosen').chosen().on('change', function(ev) {
					$(this).closest('form').validate().element($(this));
				});
				*/
			});
		</script>
		

</html>
