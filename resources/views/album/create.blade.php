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
    'route' => 'album.store'
]) !!}

<div class="form-group">
    {!! Form::label('band_id', 'Band:', ['class' => 'control-label']) !!}
    {!! Form::select('band_id', $bands) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('recorded_date', 'Recorded Date:', ['class' => 'control-label']) !!}
    {!! Form::date('recorded_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('release_date', 'Released Date:', ['class' => 'control-label']) !!}
    {!! Form::date('release_date', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('number_of_tracks', 'Number of Tracks:', ['class' => 'control-label']) !!}
    {!! Form::text('number_of_tracks', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('label', 'Label:', ['class' => 'control-label']) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('producer', 'Producer:', ['class' => 'control-label']) !!}
    {!! Form::text('producer', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre', 'Genre:', ['class' => 'control-label']) !!}
    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Create New Album', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop