<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                           
                            <li class="active hover">
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
               				                        @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                 @endif  
                                                  @if (session('testMessage'))
                                                    <div class="alert alert-success">
                                                        {{ session('testMessage') }}
                                                    </div>
                                                 @endif 
                                                  @if (session('error'))
                                                         <div class="alert alert-danger">
                                                             {{ session('error') }}
                                                         </div>
                                                 @endif   
               				                         <div class="panel panel-primary ">
											           <div class="panel-heading "><h5>Connect to Salesforce API</h5></div>
											           <div class="panel-body">  
                                 <a href="#" data-toggle="modal" data-target="#myModal" title="How ?"> <i class="fa fa-info-circle pull-right green bigger-190" ></i></a>
											           	<form method="POST"  action="{{route('salesForceConnection')}}">
											           		{{csrf_field()}}
                                                  <?php
                                                          $id = Auth::user()->client_id;

                                                          $con = App\SalesForceAuthenticate::where('user_id', $id)->first();

                                                        ?>
                                                        @if(is_null($con))
                                                        <input type="hidden" name="redirect_uri" value="http://localhost:7080/sfcrm/index.php/callback">
                                          <div class="col-xs-4 col-xs-offset-4">
                                                     <label class="block clearfix">ConsumerKey
                                                       <span class="block input-icon input-icon-right">
                                                          <input id="consumerKey" type="text" class="form-control" name="consumerKey" value="" required>
                                                       </span>
                                                     </label>
                                                     </div>

                                                      <div class="col-xs-4 col-xs-offset-4">
                                                     <label class="block clearfix">ConsumerSecret
                                                       <span class="block input-icon input-icon-right">
                                                          <input id="consumerSecret" type="text" class="form-control" name="consumerSecret" value="" required>
                                                       </span>
                                                     </label>
                                                     </div>
                                                     @else
                                                      <div class="col-xs-4 col-xs-offset-4">
                                                     <label class="block clearfix">ConsumerKey
                                                       <span class="block input-icon input-icon-right">
                                                          <input id="consumerKey" type="text" class="form-control" name="consumerKey" value="{{$con['consumerKey']}}" required>
                                                       </span>
                                                     </label>
                                                     </div>

                                                      <div class="col-xs-4 col-xs-offset-4">
                                                     <label class="block clearfix">ConsumerSecret
                                                       <span class="block input-icon input-icon-right">
                                                          <input id="consumerSecret" type="text" class="form-control" name="consumerSecret" value="{{$con['consumerSecret']}}" required>
                                                       </span>
                                                     </label>
                                                     </div>
                                                    @endif
               				                          	    <div class="col-xs-4 col-xs-offset-4">

               				                          	    <button type="submit" name="save" class="btn btn-primary pull-right">
               				                          	    	<span class="glyphicon glyphicon-floppy-save"></span>
               				                          	    save</button>
		               				              
               				                          	   </div>

                                                      <div >
                                                       

                                                       <button type="submit" name="test" class="btn btn-primary pull-right">
                                                        <span class="glyphicon glyphicon-play"></span>
                                                      Test Connection</button>
                                                     
                                                       <!-- <button  type="submit" name="test" class="btn btn-primary pull-right" disabled="disabled">
                                                        <span class="glyphicon glyphicon-play green"></span>
                                                      Connection Established</button>
                                                        -->
                                                     
                                        
                                                     </div>

               				                          	</form>
                 							             	
		               				                  </div>
		               				                </div>
		               				            </div>
               				                     <!-- PAGE CONTENT ENDS -->
               				                 </div><!-- /.col -->

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
   <div class="modal-dialog" style="width:1250px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
      </div>
      <div class="modal-body">


        <p style="font-weight: bolder;">Connection of App in Salesfoce</p>
<p> Create the Connected App in Salesforce and get the consumer key and consumer secret key for REST API Oauth authentication.</p>
<p>Log in to Salesforce, navigate to <b> Setup ➤ Create ➤Apps. </b>Under the Connected App  section, click New to create a new Connected App.</p>
<p style="font-weight: bolder;"><mark>Most Important, Set up the Call back URL same as described. If the Call Back URL is not set same as required then it will not work properly.</mark></p>
<p style="font-weight: bolder;"><mark>• (Note: 1. The CallbackUrl is http://localhost:7080/sfcrm/index.php/callback  in API Enable Oauth Settings. 2. Note down the Consumer Key and Consumer Secret Key (click to reveal))</mark></p>
  </p>
 <p style="text-align: center;"> <img src="{{asset('/')}}public/dist/images/info.png" class="center"></p>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@include('layouts.footer')

</style>
 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

   <!--  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> -->


<script type="text/javascript">
        $(document).ready(function(){
          function gettoken()
          {
          $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        
            e.preventDefault();

           // form.append('image', image);
            $.ajax({
               
                url: 'https://login.salesforce.com/services/oauth2/token',
               
                type: 'POST',
                data: {
                    'grant_type' : 'authorization_code',
                    'code': 'aPrxshT49BthlzLK5vzTfhnM8XvfcGbenCd1uVRfJlDZ3pogKKLDd4mdWjMwr3OfGFTef5ybJA==',
                    'client_id':'3MVG9d8..z.hDcPJSkmtzZgT7aQtJuvpVHUNppMya2lGXUK4luMFO9_CNWJPuM7sibYwr_MgHG6DolYTQ8Ig1',
                    'client_secret':'1839144148342125021',
                    'redirect_uri':'http://localhost:7080/sfcrm/index.php/callback'
                },
                

                success:function(response) {
                    alert(response);
                }
});
            
      }
        });
        </script>
  </body>
</html>

