<div class="card mb-3">
    <div class="card-header" style="background-color: #fff;">
        <h2 class="card-title">
            {{ $movie->title }}
        </h2>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5  style="color: #00e765; padding-right: 5px">{{ $movie->running_time }}:Watch time</h5>
            </div>
            <div class="col-md-3">
                @foreach($movie->genres as $genre)
                    <button type="button" class="btn btn-outline-warning">
                        <a href="/genre/{{ $genre->slug }}">
                            {{ $genre->genre_type }}
                        </a>
                    </button>
                @endforeach
            </div>
            <div class="col-md-3">
                <h5 style="padding: 0 5px 0 5px">Year; {{ $movie->release_date }}</h5>

            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</div>