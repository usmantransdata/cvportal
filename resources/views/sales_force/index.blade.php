<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

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
               				                        
               				                         <div class="panel panel-primary ">
											           <div class="panel-heading "><h5>Connect to Salesforce API</h5></div>
											           <div class="panel-body">  
											           	<form method="POST"  action="{{route('salesForceConnection')}}">
											           		{{csrf_field()}}

                                          <div class="col-xs-4 col-xs-offset-4">
                                                     <label class="block clearfix">ConsumerKey
                                                       <span class="block input-icon input-icon-right">
                                                          <input id="consumerKey" type="text" class="form-control" name="consumerKey" value="{{ old('consumerKey') }}" required>
                                                       </span>
                                                     </label>
                                                     </div>

                                                      <div class="col-xs-4 col-xs-offset-4">
                                                     <label class="block clearfix">ConsumerSecret
                                                       <span class="block input-icon input-icon-right">
                                                          <input id="consumerSecret" type="text" class="form-control" name="consumerSecret" value="{{ old('consumerSecret') }}" required>
                                                       </span>
                                                     </label>
                                                     </div>


               				                          	    <div class="col-xs-4 col-xs-offset-4">
               				                          	    <button type="submit" class="btn btn-primary pull-right">
               				                          	    	<span class="glyphicon glyphicon-play"></span>
               				                          	    Connect</button>
		               				              
               				                          	   </div>

               				                          	</form>
                 							             	
		               				                  </div>
		               				                </div>
		               				            </div>
               				                     <!-- PAGE CONTENT ENDS -->
               				                 </div><!-- /.col -->
<!-- 
                    <div class="row">
                      <div class="col-xs-12">
                         <form method="post" action="">
                            {{csrf_field()}}
                            <div class="row">
                       <div>
                       <div style="width:80%;margin-left:10%;margin-right:10%">
                       
                           <div class="table-header">
                         List of Client(s):                    </div>
                         <table id="sample-table-3" class="table table-striped table-bordered table-hover">

                        <thead>
                          <tr >
                             <th >Name</th>
                             <th>Email</th>
                              <th>User Type</th>   
                              <th>Acount Active/Deactive</th>
                                <th>Action</th>
                              </tr>
                        </thead>

                        <tbody>


                      </tbody>

                      </table>
                  </div>
                  </div><!-- /.span -->
                </form>
                </div><!-- /.row -->

              </div><!-- /.col --> -->
            </div><!-- /.row -->
          </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
       </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->


@include('layouts.footer')

</style>
 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

   <!--  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->

<script >



  
</script>
  </body>
</html>

