@extends('admin.dashboard')
@section('content')
	
	<!-- /.panel-heading -->
<div class="panel-body">
    <div class="row">
        <!-- /.col-lg-4 (nested) -->
        <div class="col-lg-12">
            <div id="morris-bar-chart"></div>
        </div>
        <!-- /.col-lg-8 (nested) -->
    </div>
    <!-- /.row -->
</div>
<!-- /.panel -->

@stop		

@section('scripts')
<script type="text/javascript">

          $.ajax({
            'async': false,
            'global': false,
            'url': '/reports/data',
            'dataType': "json",
            'success': function (data) {
            	
            		var jsonString = JSON.stringify(data);
            		jsonString = jsonString.replace(/\"([^(\")"]+)\":/g,"$1:");
            		alert(jsonString);
                	Morris.Bar({
				        element: 'morris-bar-chart',
				        data: jsonString,
				        xkey: 'mname',
				        ykeys: ['old', 'new'],
				        labels: ['Last Week', 'This week'],
				        hideHover: 'auto',
				        resize: true
				    });
           		 }
        	});
	
	//alert(json.length);
	
</script>
@stop