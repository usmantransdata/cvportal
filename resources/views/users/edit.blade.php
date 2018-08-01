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

                            <li class="open hover">
                             <a href="{{route('client.view')}}">
                               <i class="menu-icon fa-cogs bigger-170"></i>
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
                  <div class="row">
                    <div class="col-xs-12">

                <div class='col-lg-4 col-lg-offset-4'>
  <div class="panel panel-primary" style="width:80%;margin-left:10%;margin-right:10%">
                       
            <div class="panel-heading "><h4>Edit {{$user->first_name}}</h4></div>
            <div class="panel-body">
                    {{ Form::model($user, array('route' => array('usersUpdate', $user->id), 'method' => 'POST')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                    <div class="form-group">
                        {{ Form::label('first name', 'First Name') }}
                        {{ Form::text('first_name', null, array('class' => 'form-control')) }}
                    </div>

                      <div class="form-group">
                        {{ Form::label('last name', 'Last Name') }}
                        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('class' => 'form-control' , 'readonly' => 'true')) }}
                    </div>

                   
                     <div class="form-group">
                       @if ($user->is_delete == 1)
                      <p style="color:red">this account is deleted</p>
                      @endif
                      
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'Password') }}<br>
                        {{ Form::password('password', array('class' => 'form-control')) }}

                    </div>
                   

                    <div class="form-group">
                        {{ Form::label('password', 'Confirm Password') }}<br>
                        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                    </div>
                    {{ Form::submit('Submit', array('class' => 'pull-right btn btn-primary')) }}

                    {{ Form::close() }}

                </div>
                </div>
                </div>
 
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->

@include('layouts.footer')
  </body>
</html>

