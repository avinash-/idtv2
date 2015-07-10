@extends('admin.dashboard')
 
@section('title') Employees @stop
 
@section('content')
 
<div class="col-lg-12" style="margin-top:5%">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Tool name</th>
                    <th>Accesibility</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->emp_name }}</td>
                    <td>{{ $employee->tool_name }}</td>
                    <td> @if (($employee->access) == 1)
                        <span class="text-center"><i class='glyphicon center glyphicon-ok-circle'></i> Active</span>
                        @else
                        <span class="text-center"><i class='glyphicon center glyphicon-remove-circle'></i> Inactive</span>
                        @endif
                    </td>         
                    <td>
                        <a href="/employees/{{ $employee->id }}/edit" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/employees/' . $employee->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/employees/create/" class="btn btn-success">Add Employee</a>
 
</div>
 
@stop