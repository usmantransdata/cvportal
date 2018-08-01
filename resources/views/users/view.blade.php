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
                                <i class="menu-icon fa fa-plus-square-o bigger-170"></i>
                               <span class="menu-text"> Creates Users</span>

                               <b class="arrow fa fa-angle-down"></b>
                             </a>
                           </li>

                            <li class="active hover">
                             <a href="{{route('userView')}}">
                                <i class="menu-icon fa fa-cogs bigger-170"></i>
                               <span class="menu-text"> Manage Users</span>

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


                             @foreach($user as $users)
                             @if($users->role_id != 1)
                            <tr>

                            <td>{{ ucwords($users->first_name) }} {{ ucwords($users->last_name) }}</td>
                            <td>{{ $users->email  }}</td>
                           
                            <td>{{$users->roles->role}}</td>

                           

                            <td>
                               @if($users->acount_status == 0)
                               <center>

                                 <!-- <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="100" data-height="10" class="switchToggle" data-id="{{$users->id}}"> -->
                          <input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-4 switchToggle"  value="{{$users->id}}"/>
                          <span class="lbl middle"></span>
                 
                          </center>
                         
                          @else
                              <center>

                                <input id="id-button-borders" checked="checked" type="checkbox" class="ace ace-switch ace-switch-5 switchToggle"  value="{{$users->id}}" />
                                <span class="lbl middle"></span>
                               <!--  <input type="checkbox" data-toggle="toggle" data-on="Enabled" data-off="Disabled" data-width="100" data-height="10" class="switchToggle" data-id="{{$users->id}}" checked> -->
                          
                            </center>
                         
                          
                          @endif
                           </td>

                          <td>
                            <center>
                              <a href="{{route('userEdit', $users->id)}}" class="green">
                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                           </a>

                               <!--  <a data-toggle="modal" data-id="{{$users->id}}" data-target="#myModal" href="#" class="red">
                               <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a></a> -->
                                </center>
                            </td>
                        </tr>
                        @endif
                         @endforeach    
                      </tbody>

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

      <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                  <form action="{{route('userDel')}}" method="delete" >
                    {{csrf_field()}}
                  <div class="modal-body">
                   <span  class="text-danger"><h3>
                   Are you sure you want to delete this user ?</h3></span></a></a>
                    <input type="hidden" name="id" value="" class="del_id">
                  </div>
               
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>

                    </form>
                </div>


              </div>
            </div> 

            <!-- user activatio  -->        

             <div id="userActivate" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <form action="{{route('userActivate')}}" method="post" >
                    {{csrf_field()}}
                  <div class="modal-body">
                   <span  class="text-primary"><h3>
                   Are you sure you want to <span class="text-success">activate</span> this user ?</h3></span></a></a>
                    <input type="hidden" name="activate_id" value="" id="enable" class="active_id">
                  </div>
               
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>

                    </form>
                </div>
               </div>
            </div> 
<!-- user deactivate -->

  <div id="userDeactivate" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                  <form action="{{route('userActivate')}}" method="post" >
                    {{csrf_field()}}
                  <div class="modal-body">
                   <span  class="text-primary"><h3>
                   Are you sure you want to <span class="text-danger">de-activate</span> this user ?</h3></span></a></a>
                    <input type="hidden" name="de_activate_id" id="disable" value="" class="deActive_id">
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

</style>
 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

   <!--  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->

<script >

  $('.switchToggle').on('change', function(){
     var value = this.checked;
     var id =  $('.switchToggle').val();
         
      
      if(value == true){
      //alert($(this).val());
          $('#userActivate').modal('show'); 
          $(".modal-body #enable").val( $(this).val() );
        
      }else
      {
        //alert($(this).val());
          $('#userDeactivate').modal('show'); 
          $(".modal-body #disable").val( $(this).val() );
      }
    });

   $('#myModal').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.del_id').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });


    $('#userActivate').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.active_id').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });

    $('#userDeactivate').on('show.bs.modal', function (e) {
  var id = $(e.relatedTarget).data('id');
      $('.deActive_id').val(id);   /*
        proceed with rest of modal using the rowid variable as necessary 
        */
     });


   jQuery(function($) {
        var oTable1 = 
        $('#sample-table-3')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .dataTable( {
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

