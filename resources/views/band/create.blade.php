@extends('layouts.master')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
{!! Form::open([
    'route' => 'band.store'
]) !!}

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('start_date', 'Start Date:', ['class' => 'control-label']) !!}
    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('website', 'Website:', ['class' => 'control-label']) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('still_active', 'Active?:', ['class' => 'control-label']) !!}
    {!! Form::hidden('still_active', 0, false) !!}
    {!! Form::checkbox('still_active', 1, true) !!}
</div>

{!! Form::submit('Create New Band', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop