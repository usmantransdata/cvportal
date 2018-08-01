<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')
  
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
                            
                            <li class="active hover">
                              <a href="{{route('dashboard')}}">
                                 <i class="menu-icon fa fa-tachometer bigger-170"></i>
                                <span class="menu-text">Dashboard</span>

                                <b class="arrow fa fa-angle-down"></b>
                              </a>
                            </li>

                           <li class="open hover">
                             <a href="{{route('client.index')}}">
                                <i class="menu-icon fa fa-plus-square-o bigger-170"></i>
                               <span class="menu-text"> Create Client</span>

                               <b class="arrow fa fa-angle-down"></b>
                             </a>
                           </li>

                            <li class="open hover">
                             <a href="{{route('client.view')}}">
                                <i class="menu-icon fa fa-cogs bigger-170"></i>
                               <span class="menu-text"> Manage Clients </span>
                             </a>

                             <b class="arrow"></b>
                           </li>
                           
                            <li class="open hover">
                             <a href="{{route('user')}}">
                                <i class="menu-icon fa fa-plus-square-o bigger-170 "></i>
                               <span class="menu-text"> Creates Users</span>

                               <b class="arrow fa fa-angle-down"></b>
                             </a>
                           </li>

                            <li class="open hover">
                             <a href="{{route('userView')}}">
                                 <i class="menu-icon fa fa-cogs bigger-170 "></i>
                               <span class="menu-text"> Manage Users</span>

                               <b class="arrow fa fa-angle-down"></b>
                             </a>
                           </li>
<!-- 
                             <li class="open hover">
                             <a href="{{route('salesForce')}}">
                                 <i class="menu-icon fa fa-cloud bigger-170 "></i>
                               <span class="menu-text"> Sales Force Batch</span>

                               <b class="arrow fa fa-angle-down"></b>
                             </a>
                           </li> -->
                                             
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
                            <div class="row">
                       <div>
                        <div style="width:80%;margin-left:10%;margin-right:10%">
                        
                            <div class="table-header">
                          List of Client(s):                    </div>
                         <table id="sample-table-3" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Company Name</th>
                             <th>Btach Name</th>
                             <th>Count</th>
                             <th>Proposed Due Date</th>
                             <th>Status</th>
                            </tr>
                        </thead>
            
                         
                        <tbody>
  @foreach($orderBatch as $data)
                            <tr>
                            <td>{{$data->client->organization_name}}</td>
                            <td>{{$data->batch_name}}</td>
                            <td>{{$data->total_record_count}}</td>
                            <td>{{$data->due_date}}</td>
                            <td >
                              <a href="#" style="display: {{ $data->batchStatus->status === 'Submited' ? 'inline-block':'none'}}"  title="Submited"> 
                                <span class="label label-primary arrowed-in arrowed-in-right">
                                                      {{$data->batchStatus->status}}</span>                           
                                                    </a>

                               <a href="#" style="display: {{ $data->batchStatus->status === 'Pending' ? 'inline-block':'none'}}"  title="Pending"> 
                                 <span class="label label-warning arrowed-in arrowed-in-right">
                                                      {{$data->batchStatus->status}}</span>                        
                                                     </a>
                                    <a href="#" style="display: {{ $data->batchStatus->status === 'In-Process' ? 'inline-block':'none'}}"  title="In-Process"> 
                                     <span class="label label-info arrowed-in arrowed-in-right">
                                                      {{$data->batchStatus->status}}</span>                   
                                                          </a>
                                   <a href="#" style="display: {{ $data->batchStatus->status === 'QA-Review' ? 'inline-block':'none'}}"  title="QA-Review"> 
                                    <span class="label label-inverse arrowed-in arrowed-in-right">
                                                      {{$data->batchStatus->status}}</span>            
                                                         </a>  
                                                         
                                   <a href="#" style="display: {{ $data->batchStatus->status === 'Completed' ? 'inline-block':'none'}}"  title="Completed"> 

                                    <span class="label label-success arrowed-in arrowed-in-right">
                                                      {{$data->batchStatus->status}}</span> 

                                                  @if($data->batchStatus->status == 'Completed')
                                                   
 <a href="{{url('download-csv', $data->id)}}" class="green" title="Download">
                                           <i class="ace-icon glyphicon glyphicon-cloud-download bigger-130"></i></a> 
                                                 @endif      
                                                         </a>                                                     


                            <!-- {{$data->batchStatus->status}}
                            <br>
                                -->
                                </td>


                        </tr>
                         @endforeach   
                        <!--  managers data  -->
                      </tbody>

                      </table>

</div>
                       
                  </div>
                  </div><!-- /.span -->
                </div><!-- /.row -->

              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
      



                </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->
            <!-- manager model -->
               <div id="manager" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                          <!-- Modal content-->
                                          <div class="modal-content">
                                           
                                             <form action="{{route('statusChanged')}}" method="POST" >
                                        {{csrf_field()}}
                                            <div class="modal-body">
                                              <span class="text-danger">Are you sure you want to change status ??</span>
                                               <input type="hidden" name="manager_id" value="" class="manager_class">
                                            </div>
                                              <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary">Yes</button>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>

                                  </form>
                                      </div>

                    </div>
            </div>
<!--Client Model -->
      <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                  <form action="{{route('statusChanged')}}" method="POST" >
                    {{csrf_field()}}
                  <div class="modal-body">
                   <span  class="text-success"><h3>
                   Are you sure you want to change status Submited</h3></span></a></a>
                    <input type="hidden" name="client_id" value="" class="client_class">
                     <input type="hidden" name="pendindStatus" value="3" >
                  </div>
               
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>

                    </form>
                </div>


              </div>
            </div>

<!--Client Model -->
      <div id="inProcess" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                 
                  <form action="{{route('statusChanged')}}" method="POST" >
                    {{csrf_field()}}
                  <div class="modal-body">
                    <span  class="text-success"><h3>
                   Are you sure you want to change status In-Process</h3></span></a>
                    <input type="hidden" name="client_id" value="" class="inProcess_staus">
                    <input type="hidden" name="inProcess_staus" value="3" >
                  </div>
               
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>

                    </form>
                </div>


              </div>
            </div>    

<div id="startQa" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                 
                  <form action="{{route('statusChanged')}}" method="POST" >
                    {{csrf_field()}}
                  <div class="modal-body">
                    <span  class="text-success"><h3>
                   Are you sure you want to change status QA-Review</h3></span></a>
                    <input type="hidden" name="client_id" value="" class="startQa_status">
                    <input type="hidden" name="startQa_status" value="5" >
                  </div>
               
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>

                    </form>
                </div>


              </div>
            </div>            


@include('layouts.footer')

 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>


<script type="text/javascript">
 $('#myModal').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.client_class').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });

 $('#manager').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.manager_class').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });

 $('#inProcess').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.inProcess_staus').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });

  $('#startQa').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.startQa_status').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });


$(".show").click(function(){
    $(".hideMe").show();
}); 

$(".cross").click(function(){
    $(".hideMe").hide();
});   
</script>
<script >
   jQuery(function($) {
        var oTable1 = 
        $('#sample-table-3').dataTable( {
          bAutoWidth: false,
          "aaSorting": [],
         
          });
});
  $(document).on('click', 'th input:checkbox' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
        });
</script>
  </body>
</html>

