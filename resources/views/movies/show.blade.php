@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/movieshow.css') }}">
@endsection()
@section('content')

    <div class="container pt-3" style="background-color: #fff;">
       <div class="row mb-3">
               <div class="col-sm-9">
                   @include('layouts.show.embed')
                 @include('layouts.show.title_sh_l')
                   @include('layouts.show.pershk')
                   @include('layouts.show.review')
                   @include('layouts.show.watch')
                   @include('layouts.show.download')
               </div>
           <div class="col-sm-3">
              @foreach($latest as $movie)
                  @include('layouts.card-sidebar')
                  @endforeach
           </div>
       </div>
    </div>

@endsection()
@section('scripts')
    <script>
        // Initialize tooltip component
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        // Initialize popover component
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection

