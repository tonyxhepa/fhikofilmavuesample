@extends('layouts.app')

@section('styles')
    @endsection()
  
@section('content')
<div class="container" id="app">
 <div class="row">
     <movies-homepage></movies-homepage>
 </div>
</div>
    @endsection
@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
    @endsection
@section('footer')
    @include('layouts.footer')
@endsection

