@extends('admin.dashboard')
 
@section('title') Edit Accounts @stop
 
@section('content')
 
<div class='col-lg-10 col-lg-offset-1' style="margin-top:5%;">
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif

 
    {{ Form::model($accounts, ['role' => 'form', 'url' => '/accounts/' . $accounts->id, 'method' => 'PUT']) }}
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('id', 'Account ID') }}</div>
        <div class="col-md-10">{{ Form::text('id', null, ['placeholder' => 'Account ID', 'class' => 'form-control','readonly']) }}</div>
    </div>
 
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('manager_id', 'Manager ID') }}</div>
        <div class="col-md-10">{{ Form::text('manager_id', null, ['placeholder' => 'Manager ID', 'class' => 'form-control','readonly']) }}</div>
    </div>

   
    <div class='row form-group'>
         <div class="col-md-2">{{ Form::label('account_name', 'Account Name') }}</div>
        <div class="col-md-10">{{ Form::text('account_name', null, ['placeholder' => 'Account Name', 'class' => 'form-control']) }}</div>
    </div>


    
    <div class='row form-group'>
        <div class="col-md-12" style="text-align:center">{{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}</div>
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop