@extends('admin.dashboard')
 
@section('title') Accounts @stop
 
@section('content')
 
<div class="col-lg-12" style="margin-top:5%">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Manager ID</th>
                    <th>Account name</th>
                    <th></th>
                </tr>
            </thead>
 
            <tbody>
                @foreach ($accounts as $account)
                <tr>
                    <td>{{ $account->id }}</td>
                    <td>{{ $account->manager_id }}</td>
                    <td>{{ $account->account_name }}</td>
                    <td>
                        <a href="/accounts/{{ $account->id }}/edit" class="btn btn-info btn-xs pull-left" style="margin-right: 3px;">Edit</a>
                        {{ Form::open(['url' => '/accounts/' . $account->id, 'method' => 'DELETE']) }}
                        {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs'])}}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
 
        </table>
    </div>
 
    <a href="/accounts/create/" class="btn btn-success">Add Account</a>
 
</div>
 
@stop