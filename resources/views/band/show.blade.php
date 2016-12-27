@extends('layouts.master')

@section('content')

<h1>{{ $band->name }}</h1>
<p class="lead">
    <small>Start Date: {{ $band->start_date }}</small><br />
    <small>Website: {{ $band->website }}</small><br />
    <small>Active? {{ $band->still_active }}</small>
</p>
<hr>

<div class="row">
    <div class="col-md-6">
        <a href="{{ route('home') }}" class="btn btn-info">Home</a>
        <a href="{{ route('band.edit', $band->id) }}" class="btn btn-primary">Edit Band</a>
    </div>
    <div class="col-md-6 text-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['band.destroy', $band->id]
        ]) !!}
            {!! Form::submit('Delete this band?', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop