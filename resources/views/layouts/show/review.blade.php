<div class="card mb-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card-header" style="background-color: #fff;">
                <h3 class="card-title">Review</h3>
            </div>
            <div class="card-body">
                <p>{{ $movie->movie_review }}</p>
            </div>

        </div>
        <div class="col-md-4">
            <h2>Peaoples</h2>
            <p>{{ $movie->movie_actor }}</p>
        </div>
    </div>

</div>