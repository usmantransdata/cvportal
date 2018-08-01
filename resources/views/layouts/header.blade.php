<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>TransData</title>
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace-fonts.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace.min.css" id="main-ace-style" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace-rtl.min.css" />
    <script src="{{ asset('/') }}public/aceadmin/assets/js/ace-extra.min.js"></script>
    
    
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/chosen.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/jquery.gritter.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/select2.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/datepicker.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/bootstrap-editable.css" />

    
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/jquery-ui.min.css" />

    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ui.jqgrid.css" />
    


   </head>
  <body class="no-skin">
    <!-- #section:basics/navbar.layout -->
    <div id="navbar" class="navbar navbar-default">
      <script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>

      <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
          <span class="sr-only">Toggle sidebar</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header pull-left">
          <!-- #section:basics/navbar.layout.brand -->
          <!--  @if(auth::user()->role_id != 1 and auth::user()->role_id != 2 and auth::user()->role_id != 4)
              <a href="{{route('viewData')}}" class="navbar-brand">
                <small>
                 <i class="fa fa-leaf"></i>
                  {{auth::user()->client->organization_name}}
                </small>
                </a>
              @else
              <a href="#" class="navbar-brand">
              <i class="fa fa-leaf"></i>
                 <span>Trans Data</span>
               </a>
              @endif -->
             <!-- <a href="#" class="navbar-brand">
              <i class="fa fa-building-o red"></i>
                 <span>Trans Data</span>
               </a> -->
               <img src="{{asset('/')}}public/dist/imgs/transdata.png" style="width: 150px">
         
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
              <ul class="nav ace-nav" >
                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                   <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background-color: transparent;">
                      <!-- <img src="{{ asset('/') }}public/dist/images/user.png" style="width: 30px;" class="user-image" alt="User Image"> -->
                      <span class="hidden-xs">
                        <?php
                          $id = auth::user()->role_id;
                          $roles = \App\Roles::find($id);
                        ?>
                       <div id="profileImage"></div>
                        <span id="first_name">{{ ucwords(Auth::user()->first_name)}}</span>
                         ( {{$roles->role}} )</span>
                    </a>

                  <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                     <li class="user-header">
                     <!-- <img src="{{ asset('/') }}public/dist/images/user.png" style="width: 150px;" class="user-image" alt="User Image"> -->
                      <center>{{ Auth::user()-> first_name }}</center>
                      </p>
                    </li>
                    <li>
                      <a href="#">
                        <i class="ace-icon fa fa-cog"></i>
                        Settings
                      </a>
                    </li>

                    <li class="divider"></li>

                    <li>
                      <div class="pull-right">

               
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    
                </div>
                    </li>
                  </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
              </ul>

             
        </div>

        <!-- /section:basics/navbar.dropdown -->
      </div><!-- /.navbar-container -->
    </div>
 </body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style type="text/css">
 /* #profileImage {
      min-width: 40px !important;
    height: 40px;
    border-radius: 50%;
    background: #512DA8;
    font-size: 30px;
    color: #fff;
    display: inline-block;
    text-align: center;
    margin: 2px 0;
    vertical-align: middle;
}*/

#profileImage {
    width: 40px;
    line-height: 40px;
    border-radius: 50%;
    display: inline-block; 
    background: #d56928;
    text-align: center;
    font-size: 32px;
    border: 1px solid;
    vertical-align: middle;
}
</style>

<script type="text/javascript">
  $(document).ready(function(){
  var firstName = $('#first_name').text();
  var intials = $('#first_name').text().charAt(0);

  $('#profileImage').text(intials);
});
</script>