
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - Trans Data</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/font-awesome.min.css" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace-fonts.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace.onpage-help.css" />

  </head>
  <body class="login-layout">
    @guest
<body class="hold-transition login-page">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if (session('status'))
        <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('status') }}
        </div>
    @endif

@if ($message = Session::get('warning'))
    <div class="alert alert-warning">
        <p>{{ $message }}</p>
    </div>
@endif
    <div class="main-container" style="margin-top:50px; ">
      <div class="main-content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="login-container">
              <div class="center">
                <h1>
                  <i class="ace-icon fa fa-leaf green"></i>
                  <span class="red">Trans data</span>
                </h1>
                <h4 class="blue" id="id-company-text">&copy; Trans Data</h4>
              </div>

              <div class="space-12"></div>

              <div class="position-relative" style="margin-top: 50px;">
                <div id="login-box" class="login-box visible widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header blue lighter bigger">
                        Please Enter Your Information
                      </h4>

                      <div class="space-12"></div>
            
             @if(Session::has('alert'))
                <div class="alert alert-success">
                    {{ Session::get('alert') }}
                    @php
                    Session::forget('alert');
                    @endphp
                </div>
                @endif
                <div id="signup-box" class="signup-box widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header green lighter bigger">
                        <i class="ace-icon fa fa-users blue"></i>
                        New User Registration
                      </h4>

                      <div class="space-6"></div>
                      <p> Enter your details to begin: </p>

            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <fieldset>
                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                              <i class="ace-icon fa fa-envelope"></i>
                            </span>
                          </label>
                          </div>
                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                           
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                           </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                             <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                          </label>
                          </div>

                        <div class="form-group">
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                              <i class="ace-icon fa fa-retweet"></i>
                            </span>
                          </label>
                        </div>

                          <label class="block">
                            <input type="checkbox" class="ace" />
                            <span class="lbl">
                              I accept the
                              <a href="#">User Agreement</a>
                            </span>
                          </label>

                          <div class="space-24"></div>

                          <div class="clearfix">
                            <button type="reset" class="width-30 pull-left btn btn-sm">
                              <i class="ace-icon fa fa-refresh"></i>
                              <span class="bigger-110">Reset</span>
                            </button>

                            <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                              <span class="bigger-110">Register</span>

                              <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>
                          </div>
                      
                      </form>
                    </div>

                    <div class="toolbar center">
                      <a href="#" data-target="#login-box" class="back-to-login-link">
                        <i class="ace-icon fa fa-arrow-left"></i>
                        Back to login
                      </a>
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
              </div><!-- /.position-relative -->

              <div class="navbar-fixed-top align-right">
                <br />
                &nbsp;
                <a id="btn-login-dark" href="#">Dark</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-blur" href="#">Blur</a>
                &nbsp;
                <span class="blue">/</span>
                &nbsp;
                <a id="btn-login-light" href="#">Light</a>
                &nbsp; &nbsp; &nbsp;
              </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
   
 
     @else
 <script type="text/javascript">
    window.location = "/";//here double curly bracket
</script>

@endguest
  </body>
</html>
