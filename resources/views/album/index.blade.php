@extends('layouts.master')

@section('content')
@if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
@endif
{!! Form::label('band_id', 'Filter by band:', ['class' => 'control-label']) !!}
{!! Form::select('band_id', $bandsList) !!}
    <!-- BANDS -->
    <!-- loop over the bands -->
    <table id="albums">
        <thead>
            <tr>
                <th>Band Name</th>
                <th>Album Name</th>
                <th>Recorded Date</th>
                <th>Released Date</th>
                <th>Tracks</th>
                <th>Label</th>
                <th>Producer</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
    @foreach ($bands as $band)

        <!-- GET OUR  BAND INFORMATION -->

            <!-- loop over the albums -->
            @foreach ($band->albums as $album)
            <tr>
                <td>{{ $band->name }} </td>
                <td>{{ $album->name }}</td>
                <td>{{ $album->recorded_date }}</td>
                <td>{{ $album->release_date }}</td>
                <td>{{ $album->number_of_tracks }}</td>
                <td>{{ $album->label }}</td>
                <td>{{ $album->producer }}</td>
                <td>{{ $album->genre }}</td>
                <td><a style="display:inline-block;" class="btn btn-primary" href="{{ route('album.edit', $album->id) }}">Edit</a>
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['album.destroy', $album->id],
            'style' => 'display:inline-block'
        ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}</td>
            </tr>
            @endforeach

    @endforeach
        </tbody>
    </table>

    <script>
       $(document).ready(function() {
           var table = $('#albums').DataTable({
            'paging': false,
            'order': [[ 1, 'asc' ]],
            'info': false,
            "columnDefs": [ {
              "targets": 8,
              "orderable": false
            } ]
           });
           var val = $( "#band_id option:selected" ).text();
            if(val != "Select Band") {
                table.columns(0).search(val).draw();
            } else {
                table.columns(0).search('').draw();
            }

           $('#band_id').on('change', function() {
                var val = $( "#band_id option:selected" ).text();
                if(val != "Select Band") {
                    table.columns(0).search(val).draw();
                } else {
                    table.columns(0).search('').draw();
                }
           });
       });
   </script>
   <h1>Add a New Album</h1>
    <p class="lead"><a class="btn btn-primary" href="{{ route('album.create') }}">Add an album</a></p>

@stop