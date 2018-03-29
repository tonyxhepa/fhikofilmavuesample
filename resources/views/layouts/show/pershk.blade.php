<div class="card mb-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card-header" style="background-color: #fff;">
                <h3 class="card-title">Pershkrimi</h3>
            </div>
            <div class="card-body">
                <p>{{ $movie->movie_description }}</p>
            </div>

        </div>
        <div class="col-md-4">
            <h2>Watch Trailer</h2>
            <ul class="list-group">
                @foreach($movie->trailerlinks as $trailer)
                    <li class="list-group-item">
                        <a href="{{ $trailer->web_link }}" target="_blank">
                            {{ $trailer->web_name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>