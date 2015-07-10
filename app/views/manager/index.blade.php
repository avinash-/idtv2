@extends('admin.dashboard')
 
@section('title') Managers @stop
 
@section('content')
 
<div class="col-lg-12" style="margin-top:5%">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Manager ID</th>
                    <th>Manager Name</th>
                    <th>Username</th>
                    <th>Email</th>
                   
                    <th>Actions</th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($managers as $manager)
                <tr>
                    <td>{{ $manager->id }}</td>
                    <td>{{ $manager->manager }}</td>
                    <td>{{ $manager->username }}</td>
                    <td>{{ $manager->email }}</td>
                    
                    <td>
                        <a href="/managers/{{ $manager->id }}/edit" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/managers/' . $manager->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/managers/create" class="btn btn-success">Add Manager</a>
 
</div>
 
@stop