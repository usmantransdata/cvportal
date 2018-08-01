<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/s/dt/dt-1.10.10,se-1.1.0/datatables.min.css" rel="stylesheet">

<link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.6/css/dataTables.checkboxes.css" rel="stylesheet">


 <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                                                     <!-- {{route('orderBatch')}} -->
                      <form id="frm-example">
               				                          	<div class="col-xs-12" style="margin-top: 40px">
                 							             
                                           <table id="example" class="table table-bordered display" cellspacing="0" width="100%">
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
                                                <tbody>
                                             
                                              <?php
                                              if(empty($response['records'])){
                                                  echo '<script type="text/javascript">                                                
                                                window.location= "/sfcrm/index.php/salesForceTestConnection";
                                              </script>';
                                                }
                                              ?>
                                               @if(!empty($response['records']))
                                              @foreach($response['records'] as $search_result)
                                              <tr>
                                                <td></td>
                                                  <td style="display: none">{{$search_result['Id']}}</td>
                                                <td>{{$search_result['FirstName']}}</td>
                                                <td>{{$search_result['LastName']}}</td>
                                                <td>{{$search_result['Email']}}</td>
                                                <td>{{$search_result['Phone']}}</td>
                                                <td>{{$search_result['Title']}}</td>
                                                <td>{{$search_result['Department']}}</td>
                                                <td>{{$search_result['Validation__c']}}</td>
                                                <td>{{$search_result['Disposition__c']}}</td>
                                                <td>{{$search_result['Is_Email_Verifield__c']}}</td>
                                              </tr>
                                              @endforeach
                                              @endif
                                           </tbody>
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
                                           </table>
		               				                  </div>

                                                 <div class="col-xs-4 col-xs-offset-8 submit" style="margin-top: 40px">
                                                      <a  class=" btn btn-primary pull-right btn-lg" id="button" >
                                                        <span class="glyphicon glyphicon-forward "></span>
                                                      Next</a>
                                        
                                                 </div>

                                   </form>
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
 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>


    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 

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
   
   // Handle form submission event 
  $('#button').click( function (e) {


    $('tr.selected').each(function() {
          var data = new Array();
         
          $(this).find('td').each (function() {
            if (!$(this).hasClass("center")) {
              userdata=$(this).text();
              //alert(userdata);
              data.push(userdata); 
           }
        }); 

      $.ajax({
               
                url: '{{route("saveBatchData")}}',
                type: 'POST',
               data: {'Id': data[1],'FirstName': data[2], 'LastName': data[3],'Email': data[4],'Phone': data[5],'Title': data[6],'Department': data[7],'Validation__c': data[8],'Disposition__c': data[9],'Is_Email_Verifield__c': data[10]}, 

                success:function(response) {
                 // alert(response);
                   window.location.href = '{{url("orderBatch")}}';
                }
        });

     });
       // Prevent actual form submission
      e.preventDefault();
   });   
}); 
</script>
<script >

        $(document).ready(function() {
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 /*
     var oTable1 = 
        $('#sample-table-3').dataTable( {
          bAutoWidth: false,
          "aaSorting": [],
         
          });
        $('#sample-table-3 tbody').on( 'click', 'tr', function () {
          $(this).toggleClass('selected');
        } );

        $('.ace').change(function () {
        if (!this.checked) 
        {
         $(this).closest("tr").removeClass("selected");
        }
           
        else {
          $(this).closest("tr").addClass("selected");

        }
            
    });

$('#button').click( function () {
  
    $('tr.selected').each(function() {
          var data = new Array();
         
          $(this).find('td').each (function() {
            if (!$(this).hasClass("center")) {
              userdata=$(this).text();
              //alert(userdata);
              data.push(userdata); 
           }
        }); 
          // var arrayData = [{'FirstName': data[0], 'LastName': data[1],'Email': data[2],'Phone': data[3],'Title': data[4]}];
          $.ajax({
               
                url: '{{route("saveBatchData")}}',
                type: 'POST',
                data: {'Id': data[0],'FirstName': data[1], 'LastName': data[2],'Email': data[3],'Phone': data[4],'Title': data[5],'Department': data[6],'Validation__c': data[7],'Disposition__c': data[7],'Is_Email_Verifield__c': data[7]}, 

                success:function(response) {
                 // alert(response);
                   window.location.href = '{{url("orderBatch")}}';
                }
});
    });
} );

});
       
      

 $(document).on('click', 'th input:checkbox' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
          */ 
});    
</script>

  </body>
</html>

