@extends('layouts.admin')

@section('content')
    <h3>Te gjithe Filmat</h3>
    <div class="row">

        <table class="table table-striped table-dark">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Time</th>
                <th scope="col">Date</th>
                <th scope="col"><a href="">Edit</a> </th>
                <th scope="col"><a href="">Delete</a></th>
            </tr>
            </thead>
            <tbody>
            @foreach($serials as $serial)
                <tr>
                    <td>{{ $serial->id }}</td>
                    <td>{{ $serial->title }}</td>
                    <td>{{ $serial->running_time }}</td>
                    <td>{{ $serial->release_date }}</td>
                    <td><a href="{{ url('admin/serial/'. $serial->id . '/edit') }}">Edit</a></td>
                    <td><a href="{{ url('admin/serial/'. $serial->id . '/edit') }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection