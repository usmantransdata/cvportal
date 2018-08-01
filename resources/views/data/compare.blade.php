<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')

  
  <body class="no-skin">
          <div class="main-container" id="main-container">
            <script type="text/javascript">
              try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
              <div class="page-content">
                <div class="page-content-area">
                  <div class="page-header">
                    <h1>Compare your data here.
                    </h1>
                  </div><!-- /.page-header -->
                  <div class="row">
                    <div class="col-xs-12">
                        <div class="col-xs-6">
                          <form method="POST" action="{{route('compareUpdateFile')}}">
                            {{csrf_field()}}
                                <!-- start from here -->
                          <label class="block clearfix">All file
                            <span class="block input-icon input-icon-right">
                              <select name="batch_file" required="required" class="form-control" >
                            @foreach($company as $user)
                              <option value="{{$user->id}}">{{$user->batch_name}}</option>
                              @endforeach
                          </select>
                               
                            </span>
                          </label>
                          <div class="col-xs-6">
                          <label class="block clearfix">File to be compare
                            <span class="block input-icon input-icon-right">
                              <input type="file" name="uploaded_file">
                               
                            </span>
                          </label>
                        </div>

                        <div class="col-xs-4" style="margin-top: 10px">
                           <button class="btn btn-primary">
                                Upload 
                           </button>
                         </div>
                        
              </form>

                            <!-- this would be ends here -->
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

