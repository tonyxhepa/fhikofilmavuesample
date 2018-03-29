@extends('layouts.app')

@section('styles')
@endsection()
@section('content')
    <section>
        <div class="container">
            <div class="row mb-3">
                @foreach($movies as $movie)
                    <div class="col-md-3 mb-3">
                        @include('layouts.col-sm-3')
                    </div>
                @endforeach
            </div>
            <div class="pagination">{{ $movies->links() }}</div>

        </div>
    </section>
@endsection()
@section('scripts')

@endsection

