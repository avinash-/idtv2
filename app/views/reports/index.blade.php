@extends('admin.dashboard')
@section('content')
	
	<!-- /.panel-heading -->
<div class="panel-body">
    <div class="row">
        <!-- /.col-lg-4 (nested) -->
        <div class="col-lg-12">
            <!-- <div id="morris-bar-chart"></div> -->
            <div id="morris-bar-chart" style="height: 500px;"></div>
        </div>
        <!-- /.col-lg-8 (nested) -->
    </div>
    <!-- /.row -->
</div>
<!-- /.panel -->


@stop		

@section('scripts')
<!--<script>

               $.ajax({
               'async': false,
               'global': false,
               'url': './api',
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
	
   	alert(json.length);
</script>-->
<!--<script>
$(function() {

  // Create a Bar Chart with Morris
  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'morris-bar-chart',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Orders'] // Set the label when bar is rolled over
  });

  // Fire off an AJAX request to load the data
  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "./api", // This is the URL to the API
      data: { days: 7 } // Passing a parameter to the API to specify number of days
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
});
</script>-->
<script>
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: 'Asif',
            a: 100,
            b: 90
        }, {
            y: 'Abdul',
            a: 75,
            b: 65,
            c: 50
        }, {
            y: 'Jayaram',
            a: 50,
            b: 40
        }, {
            y: 'Pallove',
            a: 75,
            b: 65
        }, {
            y: 'Ravi',
            a: 50,
            b: 40
        }, {
            y: 'Yajurvendra',
            a: 75,
            b: 65
        }, {
            y: 'Yogambal',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Present Week', 'Last Week'],
        hideHover: 'auto',
        resize: true
    });
</script>
@stop
