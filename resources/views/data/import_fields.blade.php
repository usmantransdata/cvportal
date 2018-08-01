<!DOCTYPE html>
  @include('layouts.header')

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
					<!-- /section:settings.box -->
	 <body class="no-skin">
          <div class="main-container" id="main-container">
            <script type="text/javascript">
              try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>
              <div class="page-content">
                <div class="page-content-area">
                  <div class="page-header">
                    <h1>
								Upload Data
								
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							<form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
							    {{ csrf_field() }}

							    <table class="table">
							        @foreach ($csv_data as $row)
							            <tr>
							            @foreach ($row as $key => $value)
							                <td>{{ $value }}</td>
							            @endforeach
							            </tr>
							        @endforeach
							        <tr>
							            @foreach ($csv_data[0] as $key => $value)
							                <td>
							                    <select name="fields[{{ $key }}]">
							                        @foreach (config('app.db_fields') as $db_field)
							                            <option value="{{ $loop->index }}">{{ $db_field }}</option>
							                        @endforeach
							                    </select>
							                </td>
							            @endforeach
							        </tr>
							    </table>

							    <button type="submit" class="btn btn-primary">
							        Import Data
							    </button>
							</form>

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content-area -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->


@include('layouts.footer')
	

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>  

</html>


