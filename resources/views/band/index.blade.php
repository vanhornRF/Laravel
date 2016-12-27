@extends('layouts.master')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif

    <!-- BANDS -->
    <!-- loop over the bands -->
    <table id="bands">
        <thead>
            <tr>
                <th>Name</th>
                <th>Band Created Date</th>
                <th>Website</th>
                <th>Still Active?</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($bands as $band)
        <tr>
        <!-- GET OUR  BAND INFORMATION -->
        <td>{{ $band->name }} </td>
        <td>{{ $band->start_date }} </td>
        <td><a href="{{ $band->website }}">{{ $band->website }}</a></td>
        <td>{{ $band->still_active }} </td>
        <td>
            <a style="display:inline-block;" class="btn btn-primary" href="{{ route('band.edit', $band->id) }}">Edit</a>
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['band.destroy', $band->id],
            'style' => 'display:inline-block'
        ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <script>
       $(document).ready(function() {
           $('#bands').DataTable({
            'paging': false,
            'info': false,
            'searching': false,
            "columnDefs": [ {
              "targets": 4,
              "orderable": false
            } ]
           });
       });
   </script>
    <h1>Add a New Band</h1>
    <p class="lead"><a class="btn btn-primary" href="{{ route('band.create') }}">Add a band</a></p>


@stop