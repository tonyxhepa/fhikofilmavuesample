@extends('layouts.admin')

@section('content')

    <form method="POST" action="{{ url('admin/serials') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @include('admin.serials.fields')
    </form>
@endsection