@extends('layouts.app')

@section('styles')
@endsection()
@section('content')

    <div class="container">
        <section >
            <div class="row mb-3">
            @foreach($movies as $movie)

                    <div class="col-md-3">
                            @include('layouts.col-sm-3')
                    </div>

            @endforeach
     </div>
        </section>
        <div class="pagination">{{ $movies->links() }}</div>

    </div>

@endsection()
@section('scripts')

@endsection
@section('footer')
    @include('layouts.footer')
@endsection

