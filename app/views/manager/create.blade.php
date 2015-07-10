@extends('admin.dashboard')
 
@section('title') Create Manager @stop
 
@section('content')
 
<div class='col-lg-10 col-lg-offset-1' style="margin-top:5%">
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    
 
    {{ Form::open(['role' => 'form', 'url' => '/managers']) }}
 
    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('id', 'ID') }}</div>
        <div class="col-md-10">{{ Form::text('id', null, ['placeholder' => 'Manager ID', 'class' => 'form-control']) }}</div>
    </div>
 
    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('manager', 'Manager Name') }}</div>
        <div class="col-md-10">{{ Form::text('manager', null, ['placeholder' => 'Manager Name', 'class' => 'form-control']) }}</div>
    </div>

     <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('username', 'Username') }}</div>
        <div class="col-md-10">{{ Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) }}</div>
    </div>

    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('email', 'Email Address') }}</div>
        <div class="col-md-10">{{ Form::email('email', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) }}</div>
    </div>

    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('password', 'Password') }}</div>
        <div class="col-md-10">{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}</div>
    </div>
 
    
    <div class='row form-group'>
        <div class="col-md-12" style="text-align:center">{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}</div>
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop