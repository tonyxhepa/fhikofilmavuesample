@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

    <h1>Edit Post</h1>

    <div class="row">
        @if(count($movies->photos) >= 1)
            <div class="panel panel-danger">
                <div class="panel-heading">
                    Kliko mbi x per te fshire foton
                </div>
                <div class="panel-body">
                    @foreach($movies->photos as $photo)
                        <div class="col-sm-3">
                            <div class="alert alert-dismissible alert-warning">
                                <form method="post" action="/admin/photos/{{ $photo->id }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="close" >&times;</button>
                                </form>
                                <img height ="100"src ="{{ asset('storage').$photo->threezerozero }}" alt=""class ="img-rounded">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--<td><img height ="50"src ="{{ $photo->path ? $photo->path : 'http://placehold.it/400x400' }}" alt=""></td>--}}

        @else
            <td><img height ="50"src ="{{ 'http://placehold.it/200x200' }}" class ="img-responsive img-rounded" alt=""></td>
        @endif

    </div>
    @if(count($movies->photos) <= 5)
        <div class="form-group">
            <form id="addPhotosForm" action="{{ action('Admin\MovieController@addPhoto', $movies->id) }}"
                  class="dropzone"
                  id="my-awesome-dropzone">
                {{ csrf_field() }}
            </form>
        </div>
    @endif

    <div class="content">
        <div class="row">
            @if($movies->embeds)
                @foreach($movies->embeds as $embed)
                    <ul>
                        <li>{{ $embed->web_name }}</li>
                        <form method="post" action="/embeds/{{ $embed->id }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-primary">Delete</button>
                        </form>

                    </ul>
                @endforeach
            @endif
        </div>
        <div class="row">

            <form method="post" action="{{ action('Admin\MovieController@addEmbed', $movies->id) }}">
                {{ csrf_field() }}
                <label for="web_name">Web Name</label>
                <input type="text" name="web_name">
                <label for="web_url">Web Url</label>
                <input type="text" name="web_url">
                <button type="submit" class="bn btn-primary">Add Embed</button>
            </form>
        </div>
        <hr>
        <div class="row">
            @if($movies->shikolinks)
                @foreach($movies->shikolinks as $shikolink)
                    <ul>
                        <li>{{ $shikolink->web_name }}</li>
                        <form method="post" action="/shikolinks/{{ $shikolink->id }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-primary">Delete</button>
                        </form>

                    </ul>
                @endforeach
            @endif
        </div>
        <div class="row">

            <form method="post" action="{{ action('Admin\MovieController@addShikolinks', $movies->id) }}">
                {{ csrf_field() }}
                <label for="web_name">Web Name</label>
                <input type="text" name="web_name">
                <label for="web_url">Web Url</label>
                <input type="text" name="web_url">
                <button type="submit" class="bn btn-primary">Add Shiko Link</button>
            </form>
        </div>
        <hr>
        <div class="row">
            @if($movies->shkarkolinks)
                @foreach($movies->shkarkolinks as $shkarkolinks)
                    <ul>
                        <li>{{ $shkarkolinks->web_name }}</li>
                        <form method="post" action="/shkarkolinks/{{ $shkarkolinks->id }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-primary">Delete</button>
                        </form>

                    </ul>
                @endforeach
            @endif
        </div>
        <div class="row">

            <form method="post" action="{{ action('Admin\MovieController@addShkarkolinks', $movies->id) }}">
                {{ csrf_field() }}
                <label for="web_name">Web Name</label>
                <input type="text" name="web_name">
                <label for="web_url">Web Url</label>
                <input type="text" name="web_url">
                <button type="submit" class="bn btn-primary">Add Shkarko Link</button>
            </form>
        </div>
        <hr>
        <div class="row">
            @if($movies->trailerlinks)
                @foreach($movies->trailerlinks as $trailerlink)
                    <ul>
                        <li>{{ $trailerlink->web_name }}</li>
                        <form method="post" action="/trailerlinks/{{ $trailerlink->id }}">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-primary">Delete</button>
                        </form>

                    </ul>
                @endforeach
            @endif
        </div>
        <div class="row">

            <form method="post" action="{{ action('Admin\MovieController@addTrailerlinks', $movies->id) }}">
                {{ csrf_field() }}
                <label for="web_name">Web Name</label>
                <input type="text" name="web_name">
                <label for="web_url">Web Url</label>
                <input type="text" name="web_url">
                <button type="submit" class="bn btn-primary">Add Trailer Link</button>
            </form>
        </div>
        <hr>
        <div class="row">
        </div>
    </div>
    <div class="container">
        <div class="row">
            {!! Form::model($movies, ['route' => ['movies.update', $movies->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

            <input name="_method" type="hidden" value="PUT">
            @include('admin.movies.fields')

            {!! Form::close() !!}
        </div>
    </div>





    {{--@include('includes.form-error')--}}


@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2().val({!! json_encode($movies->genres()->pluck('id')->all()) !!}).trigger('change');
    </script>
    <script type="text/javascript" src="{{ url('js/dropzone.js') }}"></script>
    <script>
        Dropzone.options.addPhotosForm = {
            paramName: 'photo',
            maxFilesize: 3,
            maxFiles: 5,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp, .gif'
        };
    </script>

@endsection