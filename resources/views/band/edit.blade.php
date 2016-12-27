@extends('layouts.master')

@section('content')

<div class="col-sm-6">
    <h1>Editing "{{ $band->name }}"</h1>
</div>
<div class="col-sm-6" style="text-align:right;">
    <h1>Current Albums:</h1>
    @foreach ($band->albums as $album)
    <h4>{{ $album->name }}</h4>
    @endforeach
</div>
<hr>

@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

{!! Form::model($band, [
    'method' => 'PATCH',
    'route' => ['band.update', $band->id]
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

{!! Form::submit('Update Band', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@stop