<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                           <li class="open hover">
                             <a href="{{route('viewData')}}">
                               <i class="menu-icon fa fa-tachometer"></i>
                               <span class="menu-text"> Dashboard </span>
                             </a>

                             <b class="arrow"></b>
                           </li>

                           <li class="open hover">
                             <a href="{{route('data_upload')}}">
                                <i class="menu-icon fa fa-cog"></i>
                               <span class="menu-text"> Upload Data </span>

                               <b class="arrow fa fa-angle-down"></b>
                             </a>
                           </li>
                           
                            <li class="active hover">
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
                                             
            </ul><!-- /.nav-list -->

                 <!-- #section:basics/sidebar.layout.minimize -->
                 <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                   <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                 </div>
                  <script type="text/javascript">
                   try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
                 </script>
               </div>
              <div class="page-content">
                <div class="page-content-area">
                   @if (session('flash_message'))
                      <div class="alert alert-success">
                          {{ session('flash_message') }}
                      </div>
              @endif   

                @if (session('deactive_message'))
                      <div class="alert alert-success">
                          {{ session('deactive_message') }}
                      </div>
              @endif   
              
                    <div class="main-content">
            <div class="page-content">
              <div class="page-content-area">
               				<div class="row">
               				                      <div style="width:80%;margin-left:10%;margin-right:10%">
               				                          <!-- PAGE CONTENT BEGINS -->
               				                        @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                 @endif  
                                                  @if (session('testMessage'))
                                                    <div class="alert alert-success">
                                                        {{ session('testMessage') }}
                                                    </div>
                                                 @endif 
                                                  @if (session('error'))
                                                         <div class="alert alert-danger">
                                                             {{ session('error') }}
                                                         </div>
                                                 @endif   
 
               				                         <div class="panel panel-primary ">
											           <div class="panel-heading "><h5>Connect to Salesforce API</h5></div>
											           <div class="panel-body">  
											           	<form method="POST"  action="{{route('getTokenValues')}}">
											           		{{csrf_field()}}
                                                
                                          <div class="col-xs-4 col-xs-offset-4">
                                                    
                                                          <input id="consumerKey" type="hidden" class="form-control" name="grant_type" value="authorization_code" >
                                                          
                                                           <input id="consumerSecret" type="hidden" class="form-control" name="code" value="{{$sales_force_data['code']}}" >

                                                           <input id="consumerKey" type="hidden" value="{{$sales_force_data['consumerSecret']}}" class="form-control" name="client_secret" >


                                                            <input id="consumerKey" type="hidden" class="form-control" value="{{$sales_force_data['consumerKey']}}" name="client_id" >

                                                            <input id="consumerSecret" type="hidden" class="form-control" value="http://localhost:7080/sfcrm/index.php/callback" name="redirect_uri">
                                                       
                                                     </div>

                                                  
               				                          	    <div class="col-xs-4 col-xs-offset-4">

               				                          	    <button type="submit" name="save" class="btn btn-primary pull-right">
               				                          	    	<span class="glyphicon glyphicon-floppy-save"></span>
               				                          	    Get Token</button>
		               				              
               				                          	   </div>

               				                          	</form>
                 							             	
		               				                  </div>
		               				                </div>
		               				            </div>
               				                     <!-- PAGE CONTENT ENDS -->
               				                 </div><!-- /.col -->

                </form>
                </div><!-- /.row -->

              </div><!-- /.col --> 
            </div><!-- /.row -->
          </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
       </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->


@include('layouts.footer')


  </body>
</html>

