@extends('admin.dashboard')
 
@section('title') Edit Accounts @stop
 
@section('content')
 
<div class='col-lg-10 col-lg-offset-1' style="margin-top:5%;">
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

 
    {{ Form::model($employees, ['role' => 'form', 'url' => '/employees/' . $employees[0]->id, 'method' => 'PUT']) }}
 
    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('emp_id', 'Employee ID') }}</div>
        <div class="col-md-10">{{ Form::text('emp_id', null, ['placeholder' => 'Employee ID', 'class' => 'form-control']) }}</div>
    </div>

    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('emp_name', 'Employee Name') }}</div>
        <div class="col-md-10">{{ Form::text('emp_name', null, ['placeholder' => 'Employee Name', 'class' => 'form-control']) }}</div>
    </div>

    <div class="row form-group">
        <div class="col-md-2">{{ Form::label('acc_name', 'Account Name') }}</div>
        <div class="col-md-10">{{ Form::select('acc_name', $tools, null, array('class' => 'form-control')) }}</div>
    </div>

    <div class="row form-group">
        <div class="col-md-2">{{ Form::label('tool_name', 'Tool Name') }}</div>
        <div class="col-md-10">{{ Form::text('tool_name', null, ['placeholder' => 'Tool Name', 'class' => 'form-control']) }}</div>
    </div>

     <div class="row form-group">
        <div class="col-md-2">{{ Form::label('access', 'Access') }}</div>
        <div class="col-md-10">{{ Form::select('access', $access, null, array('class' => 'form-control')) }}</div>
    </div>
 

    
    <div class='row form-group'>
        <div class="col-md-12" style="text-align:center">{{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}</div>
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop