@extends('admin.dashboard')
 
@section('title') Create Accounts for Manager @stop
 
@section('content')
 
<div class='col-lg-10 col-lg-offset-1' style="margin-top:5%">
 
    @if ($errors->has())
        @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>{{ $error }}</div>
        @endforeach
    @endif
 
    
 
    {{ Form::open(['role' => 'form', 'url' => '/accounts']) }}
 
    <div class='row form-group'>
        <div class="col-md-2">{{ Form::label('account_name', 'Account Name') }}</div>
        <div class="col-md-10">{{ Form::text('account_name', null, ['placeholder' => 'Account Name', 'class' => 'form-control']) }}</div>
    </div>
 
   
    <div class='row form-group'>
        <div class="col-md-12" style="text-align:center">{{ Form::submit('Create', ['class' => 'btn btn-primary']) }}</div>
    </div>
 
    {{ Form::close() }}
 
</div>
 
@stop