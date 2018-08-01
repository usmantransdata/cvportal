
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

  <body >
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
                      <div class="space-12"></div>

                     

                <div id="signup-box" class="signup-box widget-box no-border">
                  <div class="widget-body">
                    <div class="widget-main">
                      <h4 class="header green lighter bigger">
                        <i class="ace-icon fa fa-key blue"></i>
                        Set your passwords here
                      </h4>

                      <div class="space-6"></div>
                      <p> Enter your details to begin: </p>

            <form id="form" class="form-horizontal" method="POST" action="{{ route('savePassword') }}">
                        {{ csrf_field() }}
                          
                            <input type="hidden" name="id" value="{{$id}}">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"> 
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                             <input id="password" type="password" class="form-control" name="password" required placeholder="Password" onChange="checkPasswordMatch();">
                             <span><h6>(For better security,use a password with lower case, upper case include special characters)</h6></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              <i class="ace-icon fa fa-lock"></i>
                            </span>
                            <span id="result"></span>
                          </label>
                          </div>

                        <div class="form-group">
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm">
                              <i class="ace-icon fa fa-retweet"></i>
                            </span>
                            <span class="registrationFormAlert" id="divCheckPasswordMatch"></span>
                          </label>
                        </div>

                        <!--   <label class="block">
                            <input type="checkbox" class="ace" />
                            <span class="lbl">
                              I accept the
                              <a href="#">User Agreement</a>
                            </span>
                          </label> -->

                          <div class="space-24"></div>

                          <div class="clearfix">

                            <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                              <span class="bigger-110">Save</span>

                              <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>
                          </div>
                      
                      </form>
                    </div>
                  </div><!-- /.widget-body -->
                </div><!-- /.signup-box -->
              </div><!-- /.position-relative -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.main-content -->
    </div><!-- /.main-container -->

    <!-- basic scripts -->

    <!--[if !IE]> -->
  
    <script type="text/javascript">
      window.jQuery || document.write("<script src='{{ asset('/') }}public/aceadmin/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

   
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('/') }}public/aceadmin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script><!-- jQuery Library-->

<style type="text/css">
#form .short{
font-weight:bold;
color:#FF0000;
font-size:larger;
}
#form .weak{
font-weight:bold;
color:orange;
font-size:larger;
}
#form .good{
font-weight:bold;
color:#2D98F3;
font-size:larger;
}
#form .strong{
font-weight:bold;
color: limegreen;
font-size:larger;
}  
</style>
    <!-- inline scripts related to this page -->
   <script type="text/javascript">
     $(document).ready(function() {
$('#password').keyup(function() {
$('#result').html(checkStrength($('#password').val()))
})
function checkStrength(password) {
var strength = 0
if (password.length < 6) {
$('#result').removeClass()
$('#result').addClass('short')
return 'Too short'
}
if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
if (strength < 2) {
$('#result').removeClass()
$('#result').addClass('weak')
return 'Weak'
} else if (strength == 2) {
$('#result').removeClass()
$('#result').addClass('good')
return 'Good'
} else {
$('#result').removeClass()
$('#result').addClass('strong')
return 'Strong'
}
}
});
   </script>
   <script type="text/javascript">
function checkPasswordMatch() {
    var password = $("#password").val();
    var confirmPassword = $("#password-confirm").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("<span style='font-weight: bold;    font-size: larger;color: #FF0000;'>Passwords do not match!</span>");
    else
        $("#divCheckPasswordMatch").html("<span style='font-weight: bold;    font-size: larger;color: #2D98F3;'>Passwords match.</span>");
}

$(document).ready(function () {
   $("#password-confirm").keyup(checkPasswordMatch);
});     
   </script>
     @else
 <script type="text/javascript">
    window.location = "/";//here double curly bracket
</script>

@endguest
  </body>
</html>
