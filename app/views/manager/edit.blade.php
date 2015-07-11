@extends('admin.dashboard')
 
@section('title') Create User @stop
 
@section('content')
 
<div class='col-lg-10 col-lg-offset-1' style="margin-top:5%;">
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

 
    {{ Form::model($managers, ['role' => 'form', 'url' => '/managers/' . $managers->id, 'method' => 'PUT']) }}
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('id', 'Manager ID') }}</div>
        <div class="col-md-10">{{ Form::text('id', null, ['placeholder' => 'Manager ID', 'class' => 'form-control','readonly']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('manager', 'Manager Name') }}</div>
        <div class="col-md-10">{{ Form::text('manager', null, ['placeholder' => 'Manager Name', 'class' => 'form-control']) }}</div>
    </div>

    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('username', 'Username') }}</div>
        <div class="col-md-10">{{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control','readonly']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('email', 'Email') }}</div>
        <div class="col-md-10">{{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}</div>
    </div>


    
    <div class='row form-group'>
        <div class="col-md-12" style="text-align:center">{{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}</div>
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop