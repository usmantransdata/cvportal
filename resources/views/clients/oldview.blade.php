<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')
  @include('layouts.sidebar')

  <body class="no-skin">
          <div class="main-container" id="main-container">
            <script type="text/javascript">
              try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
              <div class="page-content">
                <div class="page-content-area">
                  <div class="page-header">
                    <h1>
                      Client View
                      <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        overview &amp; stats
                      </small>
                    </h1>
                  </div><!-- /.page-header -->
                   @if (session('flash_message'))
                      <div class="alert alert-success">
                          {{ session('flash_message') }}
                      </div>
              @endif   
                    <div class="main-content">
            <div class="page-content">
              <div class="page-content-area">
               

                    <div class="row">
                      <div class="col-xs-12">
                         <form method="post" action="">
                            {{csrf_field()}}
                            <div class="row">
                       <div>

                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Company Name</th>
                                     <th>First Name</th>
                                     <th>Last Name</th>
                                     <th>Email</th>
                                     <th>Phone Number</th>
                                      <th>Address</th>
                                      <th>Created_at</th>
                                </tr>
                            </thead>
                               <tfoot>
                                  <tr>

                                    <th></th>
                                       <th>Company Name</th>
                                     <th>First Name</th>
                                     <th>Last Name</th>
                                     <th>Email</th>
                                     <th>Phone Number</th>
                                      <th>Address</th>
                                      <th>Created_at</th>
                                  </tr>
                              </tfoot>
                        </table>
                       
                  </div>
                  </div><!-- /.span -->
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
<style type="text/css">
 td.details-control {
    background: url('{{asset('/')}}public/dist/imgs/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('{{asset('/')}}public/dist/imgs/details_close.png') no-repeat center center;
} 
</style>
 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>

    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>


     <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">

<script type="text/javascript">
  
 /* Formatting function for row details - modify as you need */
function format ( d ) {
  var mytext = '<div class="row"><div class="col-xs-6 col-xs-offset-3"><table class="table table-dark"> <thead ><tr><th scope="col" style="width: 118px;">Full Name</th><th scope="col">Last Name</th><th scope="col">Email</th></tr></thead></table></div></div>'; 
    // `d` is the original data object for the row
$.each(d, function(key, value) {
    if(key=='user')
    {
     
     for (var i = 0; i < value.length; i++) {
      
    mytext =  mytext+'<div class="row"><div class="col-xs-6 col-xs-offset-3"><table class="table"><tbody><tr><td style="width:170px">'+value[i].first_name+'</td><td style="width:170px">'+value[i].last_name+'</td><td style="width:170px">'+value[i].email+'</td></tr></tbody></table></div></div>';


    /*'<table class="table" cellpadding="0" cellspacing="0" border="0" style="padding-left:50px;">'+
    '<thead>'+
        '<tr>'+
            '<th scope="col">Full Name:</th>'+
             '<th scope="col">Last Name:</th>'+
             '<th scope="col">Email:</th>'+
        '</tr>'+
        '</thead>'+
        '<tbody>'+
        '<tr>'+
            '<td>'+value[i].first_name+'</td>'+
            '<td>'+value[i].last_name+'</td>'+
            '<td>'+value[i].email+'</td>'+
        '</tr>'+
        '</tbody>'+
    '</table>';*/
     };
    }
});
   
    return mytext;
}
 
 
$(document).ready(function() {

var table = $('#example').dataTable({
          "sAjaxDataProp" : "",
          "ajax": "{{route('getUsers')}}",
        "columns": [
          {
                  "className":      'details-control',
                  "orderable":      false,
                  "data":           null,
                  "defaultContent": ''
              },
        { data: 'organization_name' } ,
        { data: 'contact_first_name' },
        { data: 'contact_last_name' },
        { data: 'contact_person_email' },
        { data: 'contact__person_phoneNumber' },
        { data: 'address' },
        { data: 'created_at' },
        ],
        "order": [[1, 'asc']]

        });
    // Add event listener for opening and closing details
    $('#example tbody').on('click', 'td.details-control', function () {
     
        var tr = $(this).closest('tr');
    
        var row =  $('#example').DataTable().row( tr );
  
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row

            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} ); 
</script>
  </body>
</html>

