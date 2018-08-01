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

                            <li class="active hover">
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

                            <li class="open hover">
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
                 @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
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
                        <div style="width:80%;margin-left:10%;margin-right:10%">
                       
                          <div class="table-header">List of Client(s):                    </div>
                         <table id="sample-table-3" class="table table-striped table-bordered table-hover">

                        <thead>
                          <tr>
                            <th>Company</th> 
                             <th>Name</th>
                             <th>Email</th>
                             <th>Phone Number</th>
                              <th>Manager</th>
                              <th>Assign</th>
                              <th>Action</th>
                              </tr>
                        </thead>

                        <tbody>


                             @foreach($client_info as $users)
                            <tr>

                     <td>{{ $users->organization_name }}</td> 
                            <td>{{ ucwords($users->contact_first_name)}} {{ucwords($users->contact_last_name) }}</td>
                            <td>{{ $users->contact_person_email  }}</td>
                            <td>{{ $users->contact__person_phoneNumber }}</td>
                         @if( ! empty($users->CompanyManager->user_id))
                              <?php
                           $manager = App\User::where('id', '=', $users->CompanyManager->user_id)->get();
                              ?>
                              <td>{{ $manager->first()['first_name']}}</td>
                              @else
                              <td class="text-danger">Not Assigned</td>
                              @endif
                             <td><a href="#" class="identifyingClass" data-id="{{$users->id}}" style="cursor: pointer;" data-toggle="modal" data-target="#assignCompany">Assign</td>
                            <td>
                                
                              <center>
                                <a href="{{route('clientFullView' , $users->id)}}" >
                                <i class="ace-icon fa fa-eye bigger-130"></i>

                                </a>
                              </center>
                            </td>
                        </tr>
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

<!-- Modal -->
<div class="modal fade" id="assignCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><center>Assign Managers To Companies</center></h5>
      </div>


      <div class="modal-body">
<form action="{{route('assign-company')}}" method="POST" >
     {{csrf_field()}}
   <input type="hidden" name="id" id="hiddenValue" value="" />
   <div class="form-group">
  <label class="col-md-3 control-label" for="type">Select Manager</label>
  <div class="col-md-9 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-file-code-o"></i></span>
    
         <select name="manager" required="required" class="form-control" >
          @foreach($user as $user)
            <option value="{{$user->id}}">{{$user->first_name}}</option>
            @endforeach
        </select>
         </div>
  </div>
</div>
<br>
<br>
      </div>
      <!-- footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>

    </div>
  </div>
</div>
          

@include('layouts.footer')

 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(function () {
        $(".identifyingClass").click(function () {
            var id = $(this).data('id');
            $("#hiddenValue").val(id);
        })
    });
</script>

<script >
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

