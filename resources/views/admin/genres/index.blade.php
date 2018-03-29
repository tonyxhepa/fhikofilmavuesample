@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row"><h2>Categories</h2></div>
        <div class="row">
            <div class="col-sm-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Fshije</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($genres)

                        @foreach($genres as $genre)

                            <tr>
                                <td>{{ $genre->id }}</td>
                                <td>{{ $genre->genre_type }}</td>
                                <td>{{ $genre->created_at->diffForHumans() }}</td>
                                <td>{{ $genre->updated_at->diffForHumans() }}</td>
                                <td>{!! Form::open(['method'=>'DELETE', 'action'=>['Admin\GenreController@destroy', $genre->id]]) !!}

                                    <div class="form-group">
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    </div>
                                    {!! Form::close() !!}</td>
                            </tr>

                        @endforeach

                    @endif

                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <form method="POST" action="{{ url('admin/genres') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="category">Genres type</label>
                        <input type="text" name="genre_type" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category">Genres description</label>
                        <input type="text" name="genre_description" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" name="create" class="btn btn-primary">
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection