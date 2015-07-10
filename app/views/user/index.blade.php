@extends('admin.dashboard')
 
@section('title') Users @stop
 
@section('content')
 
<div class="col-lg-12" style="margin-top:5%">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                     <th>Role</th>
                    
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->getFullName() }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                   
                    <td>
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/user/' . $user->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/user/create" class="btn btn-success">Add User</a>
 
</div>
 
@stop