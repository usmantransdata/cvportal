<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')
 <meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/s/dt/dt-1.10.10,se-1.1.0/datatables.min.css" rel="stylesheet">

<link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.6/css/dataTables.checkboxes.css" rel="stylesheet">

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

                          <li class="active hover">
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
											           <div class="panel-heading "><h5>Search data List</h5></div>
											           <div class="panel-body">  
               				                          	    <div class="col-xs-4 col-xs-offset-4">
               				                          	    <a href="{{route('ssfd')}}" class="btn btn-primary pull-right btn-lg">
               				                          	    	<span class="glyphicon glyphicon-search "></span>
               				                          	    search</a>
		               				              
               				                          	   </div>

               				                          	<div class="col-xs-12" style="margin-top: 40px">
                 							                <table id="example" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                                              <thead>
                                                 <tr>
                                                    <th></th>
                                                    <th style="display: none">Id</th>
                                                  <th >FirstName</th>
                                                  <th>LastName</th>
                                                   <th>Email</th>   
                                                   <th>Phone</th>
                                                     <th>Title</th>
                                                     <th>Department</th>
                                                     <th>Validation</th>
                                                     <th>Disposition</th>
                                                     <th>Email Status</th>
                                                 </tr>
                                              </thead>
                                               <tfoot>
                                                 <tr>
                                                    <th></th>
                                                    <th style="display: none">Id</th>
                                                   <th >FirstName</th>
                                                  <th>LastName</th>
                                                   <th>Email</th>   
                                                   <th>Phone</th>
                                                     <th>Title</th>
                                                     <th>Department</th>
                                                     <th>Validation</th>
                                                     <th>Disposition</th>
                                                     <th>Email Status</th>
                                                 </tr>
                                              </tfoot>
                 							               <tbody>
                                           
                 							             </tbody>

                 							             </table>	
		               				                  </div>
		               				                </div>
		               				            </div>
               				                     <!-- PAGE CONTENT ENDS -->
               				                 </div><!-- /.col -->

                   
            </div><!-- /.row -->
          </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
       </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->


@include('layouts.footer')

</style>

 <script src="https://cdn.datatables.net/s/dt/dt-1.10.10,se-1.1.0/datatables.min.js"></script>


    <script  src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.6/js/dataTables.checkboxes.min.js"></script> 

<script type="text/javascript">
 $(document).ready(function() {
   var table = $('#example').DataTable({
      //'ajax': 'https://api.myjson.com/bins/1us28',
      'columnDefs': [
         {
            'targets': 0,
            'checkboxes': {
               'selectRow': true
            }
         }
      ],
      'select': {
         'style': 'multi'
      },
      'order': [[1, 'asc']]
   });
    });
   </script>
<script type="text/javascript">

 $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $("#searchButton").click(function(){

        $.ajax({
            type: "GET",
             url: '{{url("authenticate")}}',
          // dataType: "html",
           Accept: 'application/json',
             success:function(response){

              alert(response);

           }
         });


});

</script>

  </body>
</html>

