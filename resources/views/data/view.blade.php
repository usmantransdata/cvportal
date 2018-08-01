<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')

 
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
                        <li class="active hover">
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
                <!-- /section:basics/sidebar.layout.minimize -->
              <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
              </script>
            </div>
            @else

                   <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse">
                 <script type="text/javascript">
                   try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
                 </script>

                         <ul class="nav nav-list">
                           <li class="active hover">
                             <a href="{{route('viewData')}}">
                               <i class="menu-icon fa fa-tachometer"></i>
                               <span class="menu-text"> Dashboard </span>
                             </a>

                             <b class="arrow"></b>
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
                <div class="page-content-area">
                @if (session('flash_message'))
                      <div class="alert alert-success">
                          {{ session('flash_message') }}
                      </div>
                   @endif  

                   @if (session('edit_message'))
                      <div class="alert alert-success">
                          {{ session('edit_message') }}
                      </div>
                   @endif 

                   @if (session('message'))
                      <div class="alert alert-success">
                          {{ session('message') }}
                      </div>
                   @endif 
                   
                


                    <div class="main-content">
            <div class="page-content">
              <div class="page-content-area">
             <div class="row">
                      <div class="col-xs-12">
                            <div class="row">
                       <div style="width:80%;margin-left:10%;margin-right:10%">
                       @if (session('notify'))
                      <div class="alert alert-success">
                          {{ session('notify') }}
                      </div>
                   @endif 
                        <div class="table-header">
                      List of Batch(es):                    </div>
                    <table id="sample-table-3" class="table table-striped table-bordered table-hover">

                        <thead>
                          <tr>
                              @if(auth::user()->role_id != 5)
                             <th>Company Name</th>
                             @endif
                            
                             <th>Btach Name</th>
                             <th>Count</th>
                             <th>Notes</th>
                              
                             @if(auth::user()->role_id == 5 || auth::user()->role_id == 2 || auth::user()->role_id == 4)
                             <th>Proposed Due Date</th>
                               @if(auth::user()->role_id == 2)
                                 <th>Download</th>
                                @endif
                                @if(auth::user()->role_id == 4)
                               <th>Download</th>
                               @endif
                              <th>Status</th>
                             <th>Action</th>
                             @endif    </tr>
                        </thead>
        
                      
                        <tbody>
                          @foreach($orderBatch as $data)
                   <?php
                  $data->due_date = \Carbon\Carbon::create();
                     ?>
                          @if(auth::user()->client_id == $data->client_id)

                  @if(auth::user()->role_id == 5)
                <!-- client area  -->

                           <tr>
                            <td>{{$data->batch_name}}
                              @if(!empty($data->is_sales_force))

                                 @if($data->is_sales_force == 1)
                                    <span title="" class="glyphicon glyphicon-cloud blue"></span>
                                 @endif
                                @endif
                                 @if(!empty($data->is_email_verified))
                                   @if($data->is_email_verified == 1)
                                      <span title="" class="glyphicon glyphicon-envelope orange"></span>
                                   @endif
                                @endif
                            </td>
                            <td>{{$data->total_record_count}}</td>
                            <td><a style="text-decoration: none;color: #000;" href="#" title="{{$data->instructions}}">
                              {{substr($data->instructions, 0, 100)}}
                               </a>
                            </td>
                            <td>{{$data->due_date->toFormattedDateString()}}</td>
                            

                             <td class="text-secondary">
                              @if($data->status == 'Submited')
                              <span class="label label-primary arrowed-in arrowed-in-right">
                                                            {{$data->status}}</span>
                              @elseif ($data->status == 'Pending')                              
                              <span class="label label-warning arrowed-in arrowed-in-right">
                                                            {{$data->status}}</span>
                                 @elseif ($data->status == 'In-Process') 
                                 <span class="label label-info arrowed-in arrowed-in-right">
                              {{$data->status}}</span>   
                              @elseif ($data->status == 'QA-Review')                        
                              <span class="label label-inverse arrowed-in arrowed-in-right">
                              {{$data->status}}</span>
                              @elseif ($data->status == 'Completed')
                              
                              <span class="label label-success arrowed-in arrowed-in-right">
                              {{$data->status}}</span>
                              @endif
                             </td>
                                <td>
                        <center>
  <div>
     <a href="{{route('batchEdit', $data->batchs_id)}}" class="green" title="Edit Batch" style="display: {{ $data->status === 'Pending' ? 'inline-block':'none'}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                  </a>
  <a href="{{route('batchFullView', $data->batchs_id)}}" class="blue" title="View Batch">
                                   <i class="ace-icon fa fa-eye bigger-130" ></i>
                                </a>

  <a href="#" style="display: {{ $data->status === 'Pending' ? 'inline-block':'none'}}" data-toggle="modal" data-target="#myModal" data-id="{{$data->batchs_id}}" title="Start Processing">
                                  <i class="ace-icon fa fa-play bigger-130"></i>
                                   
                                </a>
                               
                                  <a class="red" href="#" data-toggle="modal" data-target="#delBatch" data-id="{{$data->batchs_id}}" style="display: {{ $data->status === 'Pending' ? 'inline-block':'none'}}">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                         <a  class="green" style="display: {{ $data->status === 'Completed' ? 'inline-block':'none'}}">

                             
                                  <a href="{{url('download-csv-client', $data->batchs_id)}}">    <i class="ace-icon glyphicon glyphicon-cloud-download green bigger-130"></i></a> 
                                  @if ($data->status == 'Completed') 
                                       @if(!empty($data->is_sales_force))

                                       @if($data->is_sales_force == 1)
                                      <?php 
                                           $salesForceId = \App\CotentBatch::where('batch_id', $data->batchs_id)->first();
                                      ?>
                                  <a href="{{route('updateSalesforce', $data->batchs_id)}}"> <i class="ace-icon fa fa-cloud-upload blue bigger-130" ></i></a>
                                        @endif       
                                     @endif       
                                  @endif       
                            </div>    
                              
                              </center>

                            </td>
                         </tr>
                       

                        @endif

                        @elseif(auth::user()->role_id==2)
                        <!-- manager -->
                          <?php 
                              $id = \auth::user()->id;
                              $manager = \App\CompanyManager::where('user_id', '=', $id)->get()->toArray();
                               // print_r($manager);dd();
                                $output=array();
                                foreach ($manager as $value) {
                                  //print_r($value);
                                  for($i=0;$i<sizeof($value);$i++)
                                  {
                                    if(!in_array($value['client_id'], $output))
                                    {
                                   $output[] = $value['client_id']; 

                                    }
                                  }
                                }
                          ?>
                                @if(is_null($manager))
                                @else

                              @if(in_array($data->clients_id, $output))
                                 @if($data->status == 'Pending')
                                  @else
                                <tr>
                                  <td>{{$data->organization_name}}</td>

                                 <td>{{$data->batch_name}}
                           @if(!empty($data->is_sales_force))
                              @if($data->is_sales_force == 1)
                                <span title="" class="glyphicon glyphicon-cloud blue"></span>
                                @endif
                                @endif
                           @if(!empty($data->is_email_verified))

                                 @if($data->is_email_verified == 1)
                                <span title="" class="glyphicon glyphicon-envelope orange"></span>
                                @endif
                                @endif
                            </td>
                                <td>{{$data->total_record_count}}</td>
                                 <td><a style="text-decoration: none;color: #000;" href="#" title="{{$data->instructions}}">
                                  {{substr($data->instructions, 0, 10)}}
                                   </a>
                                </td>
                                <td>{{$data->due_date->toFormattedDateString()}}</td>

                                 <td>
                                           <center>
                                        <a href="{{url('download-csv', $data->batchs_id)}}" class="green" title="Download">
                                           <i class="ace-icon glyphicon glyphicon-cloud-download bigger-130"></i></a> 
                                          
                                        </center>
                                      
                                      </td>

                                      <td>
          <a href="#" style="display: {{ $data->status === 'Submited' ? 'inline-block':'none'}}"  title="Submited"> 
            <span class="label label-primary arrowed-in arrowed-in-right">
                                  {{$data->status}}</span>                           
                                </a>

           <a href="#" style="display: {{ $data->status === 'Pending' ? 'inline-block':'none'}}"  title="Pending"> 
             <span class="label label-warning arrowed-in arrowed-in-right">
                                  {{$data->status}}</span>                        
                                 </a>
                <a href="#" style="display: {{ $data->status === 'In-Process' ? 'inline-block':'none'}}"  title="Pending"> 
                 <span class="label label-info arrowed-in arrowed-in-right">
                                  {{$data->status}}</span>                   
                                      </a>
               <a href="#" style="display: {{ $data->status === 'QA-Review' ? 'inline-block':'none'}}"  title="Pending"> 
                <span class="label label-inverse arrowed-in arrowed-in-right">
                                  {{$data->status}}</span>            
                                     </a>  
                                     
               <a href="#" style="display: {{ $data->status === 'Completed' ? 'inline-block':'none'}}"  title="Pending"> 
                <span class="label label-success arrowed-in arrowed-in-right">
                                  {{$data->status}}</span>       
                                     </a>                                                     
                                      </td> 

                                <td>

                                  <center>
               <a href="#" style="display: {{ $data->status === 'Submited' ? 'inline-block':'none'}}" data-toggle="modal" data-target="#inProcess" data-id="{{$data->batchs_id}}" title="Start Processing">
                                               <i class="ace-icon fa fa-play bigger-130"></i>
                                                
                                             </a>
                <a href="#" style="display: {{ $data->status === 'In-Process' ? 'inline-block':'none'}}" data-toggle="modal" data-target="#startQa" data-id="{{$data->batchs_id}}" title="Start QA-Review">
                                                <i class="ace-icon glyphicon glyphicon-cog bigger-130"></i>
                                                 
                                              </a>                                                  

                 <a href="{{route('completedBatch', $data->batchs_id)}}" style="display: {{ $data->status === 'QA-Review' ? 'inline-block':'none'}}"  title="Complete the batch" class="green">
                                                 <i class="ace-icon glyphicon glyphicon-saved bigger-130"></i>
                                                  
                                               </a>    

                              </center>                                                               
                                </td>
                             </tr>
                                   @endif

                              
                                @endif
                             
                            @endif
                          @elseif(auth::user()->role_id == 4)
                          <!-- Admin -->
                                 @if($data->status == 'Pending')
                                    @else
                                  <tr>
                                    
                                  
                                    <td>{{$data->organization_name}}</td>
                                   <td>{{$data->batch_name}}
                          @if(!empty($data->is_sales_force))
                              @if($data->is_sales_force == 1)
                                <span title="" class="glyphicon glyphicon-cloud blue"></span>
                                @endif
                                @endif
                          @if(!empty($data->is_sales_force))

                                 @if($data->is_email_verified == 1)
                                <span title="" class="glyphicon glyphicon-envelope orange"></span>
                                @endif
                                @endif
                            </td>
                                  <td>{{$data->total_record_count}}</td>
                                  <td><a style="text-decoration: none;color: #000;" href="#" title="{{$data->instructions}}">
                              {{substr($data->instructions, 0, 10)}}
                               </a>
                            </td>
                            <td>{{$data->due_date->toFormattedDateString()}}</td>
                            <td>
                                           <center>
                                        <a href="{{url('download-csv', $data->batchs_id)}}" class="green">
                                           <i class="ace-icon glyphicon glyphicon-cloud-download bigger-130"></i></a> 
                                          
                                        </center>
                                      
                                      </td> 
                                                                  <td>
                                      <a href="#" style="display: {{ $data->status === 'Submited' ? 'inline-block':'none'}}"  title="Submited"> 
                                        <span class="label label-primary arrowed-in arrowed-in-right">
                                                              {{$data->status}}</span>                           
                                                            </a>

                                       <a href="#" style="display: {{ $data->status === 'Pending' ? 'inline-block':'none'}}"  title="Pending"> 
                                         <span class="label label-warning arrowed-in arrowed-in-right">
                                                              {{$data->status}}</span>                        
                                                             </a>
                                            <a href="#" style="display: {{ $data->status === 'In-Process' ? 'inline-block':'none'}}"  title="Pending"> 
                                             <span class="label label-info arrowed-in arrowed-in-right">
                                                              {{$data->status}}</span>                   
                                                                  </a>
                                           <a href="#" style="display: {{ $data->status === 'QA-Review' ? 'inline-block':'none'}}"  title="Pending"> 
                                            <span class="label label-inverse arrowed-in arrowed-in-right">
                                                              {{$data->status}}</span>            
                                                                 </a>  
                                                                 
                                           <a href="#" style="display: {{ $data->status === 'Completed' ? 'inline-block':'none'}}"  title="Pending"> 
                                            <span class="label label-success arrowed-in arrowed-in-right">
                                                              {{$data->status}}</span>       
                                                                 </a>                                                     
                                                                  </td> 

                                   <td>
                                    <center>
              <a href="#" style="display: {{ $data->status === 'Submited' ? 'inline-block':'none'}}" data-toggle="modal" data-target="#inProcess" data-id="{{$data->batchs_id}}" title="Start Processing">
                                              <i class="ace-icon fa fa-play bigger-130"></i>
                                               
                                            </a>  

              <a href="#" style="display: {{ $data->status === 'In-Process' ? 'inline-block':'none'}}" data-toggle="modal" data-target="#startQa" data-id="{{$data->batchs_id}}" title="Start QA-Review">
                                              <i class="ace-icon glyphicon glyphicon-cog bigger-130"></i>
                                               
                                            </a>    
                                            
               <a href="{{route('completedBatch', $data->batchs_id)}}" style="display: {{ $data->status === 'QA-Review' ? 'inline-block':'none'}}"  title="Complete the batch" class="green">
                                               <i class="ace-icon glyphicon glyphicon-saved bigger-130"></i>
                                                
                                             </a>  
                                               @if ($data->status == 'Completed')
                          @if(!empty($data->is_sales_force))
                                               
                                  @if($data->is_sales_force == 1)
                                  <a href=""> <i class="ace-icon fa fa-cloud-upload blue bigger-130" ></i></a>
                                 
                                    @endif
                                    @endif
                              
                                 @endif                                
                                             </center>
                                   </td>                               
                              </tr>
                              @endif
                        @endif
                         @endforeach   
                        <!--  managers data  -->
                      </tbody>

                      </table>


                       
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
                     <input type="hidden" name="pendindStatus" value="2" >
                  </div>
               
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>

                    </form>
                </div>


              </div>
            </div>

            <!--delBatch-->

             <div id="delBatch" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                  <form action="{{route('delBatch')}}" method="delete" >
                     {{csrf_field()}}
                  <div class="modal-body">
                   <span  class="text-danger"><h3>
                   Are you sure you want delete this batch ?</h3></span></a></a>
                    <input type="hidden" name="batch_id" value="" class="batch_id">
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
<!-- batch detail full view -->

<div id="batch_detail_view" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-body">
                    <input type="hidden" class="batch" name="batch_detail_id" value="" >

                    
                  </div>
               
                  <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>

                    </form>
                </div>


              </div>
            </div>   

            <!-- ends here -->

@include('layouts.footer')
<style type="text/css">
  .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
}

/* Tooltip text */
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    /* Position the tooltip text */
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;

    /* Fade in tooltip */
    opacity: 0;
    transition: opacity 0.3s;
}

/* Tooltip arrow */
.tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}
</style>
 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>

<script>
  $( document ).ready(function() {
 $('[data-tooltip="tooltip"]').tooltip();
});
</script> 
<script type="text/javascript">

 $('#myModal').on('show.bs.modal', function (e) {
  //alert();
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
//  alert($(e.relatedTarget).data('id'));
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

  $('#delBatch').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.batch_id').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });

   $('#batch_detail_view').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.batch').val(id);   /*
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

