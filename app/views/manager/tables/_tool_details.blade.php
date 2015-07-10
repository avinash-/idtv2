@extends('admin.dashboard')
@section('content')
	<div class="spacer20"></div>
	<div class="row">
		<div class="col-md-12">
			@if(count($tool_details)>0)
			<div class="panel panel-primary">
                <div class="panel-heading">
                   Employee Details for Account <span class="acc_name"></span>
                </div>
                <div class="">
                    <div class="table-responsive table-bordered">
                    	<table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Tool Name</th>
                                    <th>Accesibility</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1;?>
                                @foreach($tool_details as $td)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$td->eid}}</td>
                                    <td>{{$td->ename}}</td>
                                    <td >{{$td->tname}}</td>
                                    <td>@if($td->access == 1)Access @else No Access @endif</td>
                                </tr>
                                <?php $i++;?>
                                @endforeach
                            </tbody>
                            @foreach($avg as $overall)
                            <tfoot>
                                <tr>
                                    <th colspan="3"></th>
                                    <th>Overall %</th>
                                    <th class="overall">{{$overall->avg}}</th>
                                </tr>
                            </tfoot>
                            @endforeach
                        </table>
                    </div>
                </div>
               
            </div>
            @else
            	<div class="alert alert-danger">
            		There are no details to display !!
            	</div>
            @endif
		</div>
	</div>
@stop

@section('scripts')
<script type="text/javascript">
	$('.acc_name').text($('#aname').text());
</script>
@stop