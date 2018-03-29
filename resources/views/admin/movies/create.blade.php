@extends('layouts.admin')

@section('content')

    <form method="POST" action="{{ url('admin/movies') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.movies.fields')
    </form>
@endsection