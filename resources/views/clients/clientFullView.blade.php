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
                  <div class="row">
                    <div class="col-lg-12">
                        
                      
                     @if (session('error_message'))
                                    <div class="alert alert-success">
                                        {{ session('error_message') }}
                                    </div>
                    @endif       
                    
        <!--      <form action="{{route('client.store')}}" method="POST" >
                      {{ csrf_field() }} -->
               <!--    <div style="margin-top: 20px">
                   <a href="{{ url()->previous() }}" class="col-lg-8 col-lg-offset-2" style="margin-top: -30px">
                     <i class="fa fa-arrow-left btn-lg" aria-hidden="true"></i>
                    </a>
                  </div>    --> 
                  <div class="panel panel-primary" style="width:80%;margin-left:10%;margin-right:10%">
                               
                    <div class="panel-heading "><h4>Batch View</h4></div>
                    <div class="panel-body">

               <fieldset class="form-group col-lg-8 col-lg-offset-2" style="border: 1px solid">
                <legend>Company Info</legend>
                   <div class="col-lg-8 col-lg-offset-2">
                             <div class="form-group{{ $errors->has('organization_name') ? ' has-error' : '' }}">
                            <label class="block clearfix">Company Name <span style="color: red">*</span>
                              <span class="block input-icon input-icon-right">
                                <input id="organization_name" type="text" class="form-control" name="organization_name" value="{{ $clients->organization_name }}" disabled="disabled">

                                  @if ($errors->has('organization_name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('organization_name') }}</strong>
                                      </span>
                                  @endif
                                
                                    <i class="ace-icon fa fa-building"></i>
                                  </span>
                                </label>
                                </div>
                             </div>  
                              <div class="col-lg-4 col-lg-offset-2">
                         <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                          <label class="block clearfix">Conatct Person First name<span style="color: red";>*</span>
                            <span class="block input-icon input-icon-right">
                              <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $clients->contact_first_name }}" disabled="disabled">

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
                              <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $clients->contact_last_name }}" disabled="disabled">

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
                               <input id="email" type="email" class="form-control" name="email" value="{{ $clients->contact_person_email }}" disabled="disabled">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <i class="ace-icon fa fa-envelope"></i>
                            </span>
                          </label>
                           </div>
                         </div>
                        <div class="col-lg-4">
                       <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                          <label class="block clearfix">Phone Number<span style="color: red">*</span>
                            <span class="block input-icon input-icon-right">
                               <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $clients->contact__person_phoneNumber }}" disabled="disabled">
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
                                 <input id="address1" type="text" class="form-control" name="address1" value="{{ $clients->address1 }}" disabled="disabled">

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
                                 <input id="address2" type="text" class="form-control" name="address2" value="{{ $clients->address2 }}" disabled="disabled">

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
                               <input id="country" type="text" class="form-control" name="country" value="{{ $clients->country }}" disabled="disabled">

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
                               <input id="state" type="text" class="form-control" name="state" value="{{ $clients->state }}" disabled="disabled">

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
                                 <input id="city" type="text" class="form-control" name="city" value="{{ $clients->city }}" disabled="disabled">

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
                                 <input id="zip" type="text" class="form-control" name="zip" value="{{ $clients->zip }}" disabled="disabled">

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
                            <select disabled name="manager_name" class="form-control" id="form-field-select-1">
                              <?php

                              $manager =  \App\User::findOrFail($clients->CompanyManager->user_id);

                              ?>
                              <option value="" disabled selected="selected">{{$manager->first_name}}</option>
                              
                           </select>
                           
                        </label>
                         @if ($errors->has('manager_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manager_name') }}</strong>
                                    </span>
                                @endif
                       </div> 
                     </div>
                   
                     </fieldset>
                      <hr>
  <div class="col-lg-8 col-lg-offset-2" style="margin-top: 20px">
      <input type="submit" class="pull-right  btn btn-primary" value="Save">
    </div>
                       <!--  </form> -->

            </div>
</div>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->

@include('layouts.footer')
<!-- 
<script type="text/javascript">
    $(document).ready(function(){
    $(".chosen-select").chosen({allow_single_deselect:true});
});  
</script> -->
  </body>
</html>

