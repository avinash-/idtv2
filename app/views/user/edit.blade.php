@extends('admin.dashboard')
 
@section('title') Create User @stop
 
@section('content')
 
<div class='col-lg-10 col-lg-offset-1' style="margin-top:5%;">
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

 
    {{ Form::model($user, ['role' => 'form', 'url' => '/user/' . $user->id, 'method' => 'PUT']) }}
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('first_name', 'First Name') }}</div>
        <div class="col-md-10">{{ Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('last_name', 'Last Name') }}</div>
        <div class="col-md-10">{{ Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('username', 'Username') }}</div>
        <div class="col-md-10">{{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('email', 'Email') }}</div>
        <div class="col-md-10">{{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}</div>
    </div>

     <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('role', 'Role') }}</div>
        <div class="col-md-10">{{ Form::text('role', null, ['placeholder' => 'Role', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('password', 'Password') }}</div>
        <div class="col-md-10">{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('password_confirmation', 'Confirm Password') }}</div>
        <div class="col-md-10">{{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
        <div class="col-md-12" style="text-align:center">{{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}</div>
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop