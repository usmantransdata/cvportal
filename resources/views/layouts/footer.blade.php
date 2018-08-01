<!DOCTYPE html>
<html>
<body>


      <div class="footer">
        <div class="footer-inner">
          <!-- #section:basics/footer -->
          <div class="footer-content">
            <span class="bigger-120">
               <img src="{{asset('/')}}public/dist/imgs/transdata.png" style="width: 100px">
             &copy; 2016-2018
            </span>

            &nbsp; &nbsp;
          <!--   <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span> -->
          </div>

          <!-- /section:basics/footer -->
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!-- basic scripts -->

<script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.min.js"></script>
 <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
 
<script type="text/javascript">

    jQuery(document).ready(function($) {

     jQuery('.summernote').summernote({

           height: 300,

      });

   });

</script>
    <!--[if !IE]> -->
    <script type="text/javascript">
      window.jQuery || document.write("<script src='{{ asset('/') }}public/aceadmin/assets/js/jquery.min.js'>"+"<"+"/script>");
    </script>

    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='{{ asset('/') }}public/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery-ui.custom.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.easypiechart.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.sparkline.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/flot/jquery.flot.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/flot/jquery.flot.pie.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/flot/jquery.flot.resize.min.js"></script>
    <!-- jggrid -->

   

    <!-- ace scripts -->
    <script src="{{ asset('/') }}public/aceadmin/assets/js/ace-elements.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/ace.min.js"></script>
    <!-- inline scripts related to this page -->
   
    <!-- the following scripts are used in demo only for onpage help and you don't need them -->
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/assets/css/ace.onpage-help.css" />
    <link rel="stylesheet" href="{{ asset('/') }}public/aceadmin/docs/assets/js/themes/sunburst.css" />
    <script type="text/javascript"> ace.vars['base'] = '..'; </script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/ace/elements.onpage-help.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/ace/ace.onpage-help.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/docs/assets/js/rainbow.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/docs/assets/js/language/generic.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/docs/assets/js/language/html.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/chosen.jquery.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/docs/assets/js/language/css.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/docs/assets/js/language/javascript.js"></script>
  </body>
</html>