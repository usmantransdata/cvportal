<!DOCTYPE html>
<html lang="en">
  @include('layouts.header')
  @include('layouts.sidebar')

  <body class="no-skin">
          <div class="main-container" id="main-container">
            <script type="text/javascript">
              try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
          <div class="page-content">
                <div class="page-content-area">
                  <div class="page-header">
                    <h1>
                      Upload File
                   
                    </h1>
                  </div><!-- /.page-header -->
                   @if (session('success'))
                      <div class="alert alert-success">
                          {{ session('success') }}
                      </div>
                  @endif   
                   @if (session('error'))
                      <div class="alert alert-danger">
                          {{ session('error') }}
                      </div>
                  @endif   

         <div class="main-content">
            <div class="page-content">
              <div class="page-content-area">
               
             

                    <div class="row">
               <div class="col-md-6 col-md-offset-3">
                   <div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" >
                  <br/>
        <form action="{{ route('importExcel') }}" class="form-horizontal" method="POST" enctype="multipart/form-data">
           {{ csrf_field() }} 
                 
                  <div class="form-group">
                    <label for="company">Company</label>
                     <select name="company" class="form-control" >
                                <option disabled="disabled" selected="selected">Company Name</option>
                                @foreach($company as $company)
                                <option value="{{$company->id}}">{{$company->organization_name}}</option>
                                @endforeach
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="batch_name">Batch Name</label>
                    <input id="batch_name" required="required" name="batch_name" type="text" class="form-control" placeholder="Btach Name">
                  </div>

                   <div class="form-group">
                    <div class="form-group col-md-6">

                      <input id="excelfile" type="file" name="import_file" />
                  
                    </div>
                    <div class="form-group col-md-6">
                        <a  onclick="ExportToTable()" class="btn btn-primary btn-xs">Preview File</a>

                        <button style="margin-left: 10px" class="btn btn-primary btn-xs">Upload</button>
           
                    </div>
                  </div>
                  
                 
              </form>
                             </div>
                 </div>
      
              </div><!-- /.col --> 
            </div><!-- /.row -->
          </div><!-- /.page-content-area -->
   
                       <table id="exceltable" class="table table-striped table-bordered table-hover">

                        <thead>
                          <tr>

                           
                             <th></th>
                             <th></th>
                             <th></th>
                             <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
                             

                             <!-- <th></th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                             
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                           
                        </tr>   
                      </tbody>

                      </table>
        </div><!-- /.page-content -->
      </div><!-- /.main-content -->
      



          </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->
     </div><!-- /.main-content -->

@include('layouts.footer')

 <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}public/aceadmin/assets/js/jquery.dataTables.bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>  
<script >
  $(document).on('click', 'th ' , function(){
          var that = this;
          $(this).closest('table').find('tr > td:first-child input:checkbox')
          .each(function(){
            this.checked = that.checked;
            $(this).closest('tr').toggleClass('selected');
          });
        });
</script>

<script type="text/javascript">
   function ExportToTable() {  
     var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#excelfile").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) {  
                         BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
                 $('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
             }  
         }  
         else {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else {  
         alert("Please upload a valid Excel file!");  
     }  
 }  


 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
     for (var i = 0; i < jsondata.length; i++) {  
         var row$ = $('<tr/>');  
         for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
             var cellValue = jsondata[i][columns[colIndex]];  
             if (cellValue == null)  
                 cellValue = "";  
             row$.append($('<td/>').html(cellValue));  
         }  
         $(tableid).append(row$);  
     }  
 }  
 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
     var columnSet = [];  
     var headerTr$ = $('<tr/>');  
     for (var i = 0; i < jsondata.length; i++) {  
         var rowHash = jsondata[i];  
         for (var key in rowHash) {  
             if (rowHash.hasOwnProperty(key)) {  
                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                     columnSet.push(key);  
                     headerTr$.append($('<th/>').html(key));  
                 }  
             }  
         }  
     }  
     $(tableid).append(headerTr$);  
     return columnSet;  
 }  
</script>
  </body>
</html>

