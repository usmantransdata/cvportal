<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')
 <meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

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

                          <li class="active hover">
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
               				                      <div style="width:80%;margin-left:10%;margin-right:10%">
               				                          <!-- PAGE CONTENT BEGINS -->
               				                        
               				                         <div class="panel panel-primary ">
											           <div class="panel-heading "><h5>Search data List</h5></div>
											           <div class="panel-body"> 
                                  <div class="row">
                                   
               				                        <div class="col-xs-6 col-xs-offset-3">
                      <form method="POST" action="{{route('salesForceBatch')}}">
                      {{csrf_field()}}      
                      <input type="hidden" name="company" value="{{$company->id}}">                    
                        <div class="form-group{{ $errors->has('batch_name') ? ' has-error' : '' }}">
                          <label class="block clearfix">Batch Name
                            <span class="block input-icon input-icon-right">
                              <input id="batch_name" type="text" class="form-control" name="batch_name" value="{{ old('batch_name') }}" required autofocus>

                                @if ($errors->has('batch_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batch_name') }}</strong>
                                    </span>
                                @endif
                            </span>
                          </label>
                          </div>

                          <div class="form-group{{ $errors->has('batch_name') ? ' has-error' : '' }}">
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                             <input type="checkbox" name="validate_email" id="id-file-format" class="ace">
                              <span class="lbl"> Validate Email</span>
                            </span>
                          </label>
                          </div>


                           <div class="form-group{{ $errors->has('due_date') ? ' has-error' : '' }}">
                          <label class="block clearfix">Batch Due Date
                            <span class="block input-icon input-icon-right">
                              <input name="due_date" maxlength="100" type="text" class=" col-xs-12 col-sm-0  date-picker" id="id-date-picker-1" data-date-format="dd-mm-yyyy" placeholder="yyyy-dd-mm" required="required"/>
                              

                                @if ($errors->has('due_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('due_date') }}</strong>
                                    </span>
                                @endif
                            </span>
                          </label>
                          </div>

                        <div class="form-group{{ $errors->has('instructions') ? ' has-error' : '' }}">
                          <label class="block clearfix">Special Notes
                            <span class="block input-icon input-icon-right">
                               <textarea id="instructions" name="instructions" type="text" class="col-xs-12 col-sm-0" placeholder="Special Instructions" cols="10" rows="5"></textarea>

                                @if ($errors->has('instructions'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instructions') }}</strong>
                                    </span>
                                @endif
                            </span>
                          </label>
                           </div>

                                             <div class="col-xs-4 col-xs-offset-8" style="margin-top: 40px">
                                                      <button type="submit" class="btn btn-primary pull-right btn-lg">
                                                        <span class="glyphicon glyphicon-floppy-save "></span>
                                                      Save Batch</button>
                                        
                                                  </div>


                                         </form>
                                              </div>    
		               				                </div>
		               				              </div>
               				                     <!-- PAGE CONTENT ENDS -->
               				               </div><!-- /.col -->

                   
                      </div><!-- /.row -->
                    </div><!-- /.page-content-area -->
                  </div><!-- /.page-content -->
                </div><!-- /.main-content -->
                 </div><!-- /.page-content-area -->
              </div><!-- /.page-content -->
            </div><!-- /.main-content -->


@include('layouts.footer')

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

<script type="text/javascript">
  $('.date-picker').datepicker({
    format: 'yyyy-mm-dd',
   // startDate: '-3d'
});
</script>

  </body>
</html>

