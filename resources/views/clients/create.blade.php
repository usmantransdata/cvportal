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

                           <li class="active hover">
                             <a href="{{route('client.index')}}">
                                 <i class="menu-icon fa fa-plus-square-o bigger-170"></i>
                               <span class="menu-text"> Create Client</span>
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
                            </a>
                           </li>

                            <li class="open hover">
                             <a href="{{route('userView')}}">
                                <i class="menu-icon fa fa-cog"></i>
                               <span class="menu-text"> Manage Users</span>
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
                  <div class="row">
                    <div class="col-lg-12">                      
                     @if (session('error_message'))
                                    <div class="alert alert-success">
                                        {{ session('error_message') }}
                                    </div>
                    @endif       
          <div class="panel panel-primary" style="width:80%;margin-left:10%;margin-right:10%">
                       
            <div class="panel-heading "><h5>Add New Client</h5></div>
            <div class="panel-body">
             <form action="{{route('client.store')}}" method="POST" >
                      {{ csrf_field() }}

               <fieldset class="form-group col-lg-8 col-lg-offset-2" style="border: 1px solid">
                <legend>Company Info</legend>
                   <div class="col-lg-8 col-lg-offset-2">
                             <div class="form-group{{ $errors->has('organization_name') ? ' has-error' : '' }}">
                            <label class="block clearfix">Company Name <span style="color: red">*</span>
                              <span class="block input-icon input-icon-right">
                                <input id="organization_name" type="text" class="form-control" name="organization_name" value="{{ old('organization_name') }}" required autofocus>

                                  @if ($errors->has('organization_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('organization_name') }}</strong>
                                      </span>
                                  @endif
                                  <span id="result2"></span>
                                    <i class="ace-icon fa fa-building"></i>
                                  </span>
                                </label>
                                </div>
                             </div>  
                              <div class="col-lg-4 col-lg-offset-2">
                         <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                          <label class="block clearfix">Conatct Person First name<span style="color: red";>*</span>
                            <span class="block input-icon input-icon-right">
                              <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                              
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                          </div>
                        </div>
                        <div class='col-lg-4'>    
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                          <label class="block clearfix">Conatct Person Last name<span style="color: red";>*</span>
                            <span class="block input-icon input-icon-right">
                              <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                              
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>
                          </div>
                        </div>

                         <div class='col-lg-4 col-lg-offset-2'>    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="block clearfix">Email Adress<span style="color: red">*</span>
                            <span class="block input-icon input-icon-right">
                               <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <span id='result'></span>
                            <i class="ace-icon fa fa-envelope"></i>
                            </span>
                          </label>
                           </div>
                         </div>
                        <div class="col-lg-4">
                       <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                          <label class="block clearfix">Phone Number<span style="color: red">*</span>
                            <span class="block input-icon input-icon-right">
                               <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required>
                               <span><h6 class="text-info">(Phone number must be start with "01")</h6></span>
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            <i class="ace-icon fa fa-phone"></i>
                            </span>
                          </label>
                           </div> 
                         </div>
                  </fieldset>
                    <div class="col-lg-8 col-lg-offset-2">
                    </div>

                     <div class="col-lg-8 col-lg-offset-2">
                    </div>

                    <fieldset class="form-group col-lg-8 col-lg-offset-2" style="border: 1px solid">
                       <legend>Company Address</legend>

                        <div class="col-lg-4 col-lg-offset-2">
                            <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                            <label class="block clearfix">Address1<span style="color: red">*</span>
                              <span class="block input-icon input-icon-right">
                                 <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" required>

                                  @if ($errors->has('address1'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('address1') }}</strong>
                                      </span>
                                  @endif
                              <i class="ace-icon fa fa-map-marker"></i>
                              </span>
                            </label>
                             </div>  
                           </div>

                           <div class="col-lg-4 ">
                                <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                            <label class="block clearfix">Address2<span style="color: red">*</span>
                              <span class="block input-icon input-icon-right">
                                 <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" required>

                                  @if ($errors->has('address2'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('address2') }}</strong>
                                      </span>
                                  @endif
                              <i class="ace-icon fa fa-map-marker"></i>
                              </span>
                            </label>
                           </div>
                        </div>
                         <div class="col-lg-4 col-lg-offset-2">  
                              
                          <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                          <label class="block clearfix">Country<span style="color: red">*</span>
                            <span class="block input-icon input-icon-right">
                               <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required>

                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            <i class="ace-icon fa fa-map-marker"></i>
                            </span>
                          </label>
                           </div> 
                         </div>
                        <div class='col-lg-4'>    
                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                          <label class="block clearfix">State<span style="color: red">*</span>
                            <span class="block input-icon input-icon-right">
                               <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            <i class="ace-icon fa fa-map-marker"></i>
                            </span>
                          </label>
                           </div> 
                         </div>

                          <div class="col-lg-4 col-lg-offset-2">

                           <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label class="block clearfix">City<span style="color: red">*</span>
                              <span class="block input-icon input-icon-right">
                                 <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>

                                  @if ($errors->has('city'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('city') }}</strong>
                                      </span>
                                  @endif
                              <i class="ace-icon fa fa-map-marker"></i>
                              </span>
                            </label>
                             </div> 

                         </div>
                         <div class="col-lg-4">
                         <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            <label class="block clearfix">Zip<span style="color: red">*</span>
                              <span class="block input-icon input-icon-right">
                                 <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required>

                                  @if ($errors->has('zip'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('zip') }}</strong>
                                      </span>
                                  @endif
                              <i class="ace-icon fa fa-map-marker"></i>
                              </span>
                            </label>
                             </div> 
                          </div>
                     </fieldset>

                      <fieldset class="form-group col-lg-8 col-lg-offset-2" style="border: 1px solid">
                       <legend>Account Info</legend>

                     <div class="col-lg-8 col-lg-offset-2"> 
                      <div class="form-group{{ $errors->has('manager_name') ? ' has-error' : '' }}">
                        <label class="block clearfix">Chose Manager
                            <select name="manager_name" class="form-control" id="form-field-select-1">
                               @foreach ($CompanyManager as $manager)
                              <option value="{{$manager->id}}">{{$manager->first_name}}</option>
                              @endforeach
                           </select>
                           
                        </label>
                         @if ($errors->has('manager_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manager_name') }}</strong>
                                    </span>
                                @endif
                       </div> 
                     </div>

                     <div class="col-lg-8 col-lg-offset-2"> 
                       <p>Enable or Disable Account Status</p>
                          <input name="switch-field-1" id="switch-field-1" class="ace ace-switch" type="checkbox" checked="checked" />
                          <span class="lbl"></span>
                     
                      </div>
                     </fieldset>
                      <hr>
  <div class="col-lg-8 col-lg-offset-2" style="margin-top: 20px">
      <input type="submit" class="pull-right  btn btn-primary" value="Save">
    </div>
                        </form>

                       </div>
                                  </div>          

            </div>

                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->

@include('layouts.footer')
<script type="text/javascript">
 
/*!
 * jQuery Browser Plugin v0.0.6
 * https://github.com/gabceb/jquery-browser-plugin
 *
 * Original jquery-browser code Copyright 2005, 2013 jQuery Foundation, Inc. and other contributors
 * http://jquery.org/license
 
 * Modifications Copyright 2013 Gabriel Cebrian
 * https://github.com/gabceb
 *
 * Released under the MIT license
 *
 * Date: 2013-07-29T17:23:27-07:00
 
 https://github.com/gabceb/jquery-browser-plugin/blob/master/dist/jquery.browser.js
 */

(function( jQuery, window, undefined ) {
  "use strict";

  var matched, browser;

  jQuery.uaMatch = function( ua ) {
    ua = ua.toLowerCase();

    var match = /(opr)[\/]([\w.]+)/.exec( ua ) ||
      /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
      /(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec( ua ) ||
      /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
      /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
      /(msie) ([\w.]+)/.exec( ua ) ||
      ua.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec( ua ) ||
      ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
      [];

    var platform_match = /(ipad)/.exec( ua ) ||
      /(iphone)/.exec( ua ) ||
      /(android)/.exec( ua ) ||
      /(windows phone)/.exec( ua ) ||
      /(win)/.exec( ua ) ||
      /(mac)/.exec( ua ) ||
      /(linux)/.exec( ua ) ||
      /(cros)/i.exec( ua ) ||
      [];

    return {
      browser: match[ 3 ] || match[ 1 ] || "",
      version: match[ 2 ] || "0",
      platform: platform_match[ 0 ] || ""
    };
  };

  matched = jQuery.uaMatch( window.navigator.userAgent );
  browser = {};

  if ( matched.browser ) {
    browser[ matched.browser ] = true;
    browser.version = matched.version;
    browser.versionNumber = parseInt(matched.version);
  }

  if ( matched.platform ) {
    browser[ matched.platform ] = true;
  }

  // These are all considered mobile platforms, meaning they run a mobile browser
  if ( browser.android || browser.ipad || browser.iphone || browser[ "windows phone" ] ) {
    browser.mobile = true;
  }

  // These are all considered desktop platforms, meaning they run a desktop browser
  if ( browser.cros || browser.mac || browser.linux || browser.win ) {
    browser.desktop = true;
  }

  // Chrome, Opera 15+ and Safari are webkit based browsers
  if ( browser.chrome || browser.opr || browser.safari ) {
    browser.webkit = true;
  }

  // IE11 has a new token so we will assign it msie to avoid breaking changes
  if ( browser.rv )
  {
    var ie = "msie";

    matched.browser = ie;
    browser[ie] = true;
  }

  // Opera 15+ are identified as opr
  if ( browser.opr )
  {
    var opera = "opera";

    matched.browser = opera;
    browser[opera] = true;
  }

  // Stock Android browsers are marked as Safari on Android.
  if ( browser.safari && browser.android )
  {
    var android = "android";

    matched.browser = android;
    browser[android] = true;
  }

  // Assign the name and platform variable
  browser.name = matched.browser;
  browser.platform = matched.platform;


  jQuery.browser = browser;
})( jQuery, window );

/*
  Masked Input plugin for jQuery
  Copyright (c) 2007-2011 Josh Bush (digitalbush.com)
  Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license) 
  Version: 1.3
  https://cloud.github.com/downloads/digitalBush/jquery.maskedinput/jquery.maskedinput-1.3.min.js
*/
(function(a){var b=(a.browser.msie?"paste":"input")+".mask",c=window.orientation!=undefined;a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn"},a.fn.extend({caret:function(a,b){if(this.length!=0){if(typeof a=="number"){b=typeof b=="number"?b:a;return this.each(function(){if(this.setSelectionRange)this.setSelectionRange(a,b);else if(this.createTextRange){var c=this.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select()}})}if(this[0].setSelectionRange)a=this[0].selectionStart,b=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var c=document.selection.createRange();a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length}return{begin:a,end:b}}},unmask:function(){return this.trigger("unmask")},mask:function(d,e){if(!d&&this.length>0){var f=a(this[0]);return f.data(a.mask.dataName)()}e=a.extend({placeholder:"_",completed:null},e);var g=a.mask.definitions,h=[],i=d.length,j=null,k=d.length;a.each(d.split(""),function(a,b){b=="?"?(k--,i=a):g[b]?(h.push(new RegExp(g[b])),j==null&&(j=h.length-1)):h.push(null)});return this.trigger("unmask").each(function(){function v(a){var b=f.val(),c=-1;for(var d=0,g=0;d<k;d++)if(h[d]){l[d]=e.placeholder;while(g++<b.length){var m=b.charAt(g-1);if(h[d].test(m)){l[d]=m,c=d;break}}if(g>b.length)break}else l[d]==b.charAt(g)&&d!=i&&(g++,c=d);if(!a&&c+1<i)f.val(""),t(0,k);else if(a||c+1>=i)u(),a||f.val(f.val().substring(0,c+1));return i?d:j}function u(){return f.val(l.join("")).val()}function t(a,b){for(var c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.placeholder)}function s(a){var b=a.which,c=f.caret();if(a.ctrlKey||a.altKey||a.metaKey||b<32)return!0;if(b){c.end-c.begin!=0&&(t(c.begin,c.end),p(c.begin,c.end-1));var d=n(c.begin-1);if(d<k){var g=String.fromCharCode(b);if(h[d].test(g)){q(d),l[d]=g,u();var i=n(d);f.caret(i),e.completed&&i>=k&&e.completed.call(f)}}return!1}}function r(a){var b=a.which;if(b==8||b==46||c&&b==127){var d=f.caret(),e=d.begin,g=d.end;g-e==0&&(e=b!=46?o(e):g=n(e-1),g=b==46?n(g):g),t(e,g),p(e,g-1);return!1}if(b==27){f.val(m),f.caret(0,v());return!1}}function q(a){for(var b=a,c=e.placeholder;b<k;b++)if(h[b]){var d=n(b),f=l[b];l[b]=c;if(d<k&&h[d].test(f))c=f;else break}}function p(a,b){if(!(a<0)){for(var c=a,d=n(b);c<k;c++)if(h[c]){if(d<k&&h[c].test(l[d]))l[c]=l[d],l[d]=e.placeholder;else break;d=n(d)}u(),f.caret(Math.max(j,a))}}function o(a){while(--a>=0&&!h[a]);return a}function n(a){while(++a<=k&&!h[a]);return a}var f=a(this),l=a.map(d.split(""),function(a,b){if(a!="?")return g[a]?e.placeholder:a}),m=f.val();f.data(a.mask.dataName,function(){return a.map(l,function(a,b){return h[b]&&a!=e.placeholder?a:null}).join("")}),f.attr("readonly")||f.one("unmask",function(){f.unbind(".mask").removeData(a.mask.dataName)}).bind("focus.mask",function(){m=f.val();var b=v();u();var c=function(){b==d.length?f.caret(0,b):f.caret(b)};(a.browser.msie?c:function(){setTimeout(c,0)})()}).bind("blur.mask",function(){v(),f.val()!=m&&f.change()}).bind("keydown.mask",r).bind("keypress.mask",s).bind(b,function(){setTimeout(function(){f.caret(v(!0))},0)}),v()})}})})(jQuery);

/*     My Javascript      */

$(function(){
  
  $("#phone_number").mask("+(99)999 999-9999");


  $("#phone_number").on("blur", function() {
      var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

      if( last.length == 5 ) {
          var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

          var lastfour = last.substr(1,4);

          var first = $(this).val().substr( 0, 9 );

          $(this).val( first + move + '-' + lastfour );
      }
  });
});  

$( "#email" ).change(function() {
    var emailstring = $("#email").val();

     $("#result").text("");
  var email = $("#email").val();
  if (validateEmail(email)) {
                $.ajax({
                   url: "{{route('email_check')}}",
                   type: 'get',
                   //data: 'organization_name=' + username,
                   success: function(result){
                    // alert();
                    if ($.inArray($("#email").val(), result) >= 0) {
                        $("#result").text(email + " is already used please try another");
                       $("#result").css("color", "red");
                    }else{
                                   $("#result").text(email + "is valid");
                                   $("#result").css("color", "green");
                              }
                            }
                   });

  } else {
    $("#result").text(email + " is not valid");
    $("#result").css("color", "red");
  }
  return false;
});

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

var username = $('#organization_name').val();
$('#organization_name').change(function() {
   $.ajax({
      url: "{{route('organization_name_check')}}",
      type: 'get',
      //data: 'organization_name=' + username,
      success: function(result){
       // alert();
       if ($.inArray($('#organization_name').val(), result) >= 0) {
           $("#result2").text($('#organization_name').val() + " is already used please try another");
          $("#result2").css("color", "red");
       }else{
                      $("#result2").text($('#organization_name').val() + " is valid");
                      $("#result2").css("color", "green");
                 }
               }
      });
});
</script>
  </body>
</html>

