<div class="card mb-3">
    @if(count($movie->photos) > 0)
        <img class="card-img-top" src="{{ asset('storage').$movie->photos->first()->fivefivezero }}" alt="Card image cap">
    @endif
    <div class="card-header" style="background-color: #fff;">
        <h5 class="card-title">
            <a href="{{ url('/'. $movie->slug) }}">
                {{ $movie->title }}
            </a>
        </h5>
    </div>
</div>