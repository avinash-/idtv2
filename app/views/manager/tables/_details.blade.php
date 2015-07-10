@extends('admin.dashboard')
@section('content')
	<div class="spacer20"></div>
	<div class="row">
		<div class="col-md-12">
			@if(count($details)>0)
			<div class="panel panel-primary">
                <div class="panel-heading">
                   Account Details for <span class="manager_name"></span>
                </div>
                <div class="">
                    <div class="table-responsive table-bordered">
                    	<table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Manager Name</th>
                                    <th>Account Name</th>
                                    <th>Over all %</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i=1;?>
                                @foreach($details as $d)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td id="mname">{{$d->ManagerName}}</td>
                                    <td>{{$d->AccountName}}</td>
                                    <td>{{$d->percentage}}</td>
                                    <td><a href="/account/details/{{$d->AccId}}" class="btn btn-info btn-sm">View Account Details</a></td>
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
	$('.manager_name').text($('#mname').text());
</script>
@stop