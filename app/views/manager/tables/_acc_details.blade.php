@extends('admin.dashboard')
@section('content')
	<div class="spacer20"></div>
	<div class="row">
		<div class="col-md-12">
			@if(count($acc_details)>0)
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
                                    <th>Manager Name</th>
                                    <th>Account Name</th>
                                    <th>Over all %</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1;?>
                                @foreach($acc_details as $ad)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$ad->eid}}</td>
                                    <td>{{$ad->ename}}</td>
                                    <td >{{$ad->ManagerName}}</td>
                                    <td id="aname">{{$ad->AccountName}}</td>
                                    <td>{{$ad->percentage}}</td>
                                    <td><a href="/tools/details/{{$ad->eid}}" class="btn btn-info btn-sm">View all Tools</a></td>
                                </tr>
                                <?php $i++;?>
                                @endforeach
                            </tbody>
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