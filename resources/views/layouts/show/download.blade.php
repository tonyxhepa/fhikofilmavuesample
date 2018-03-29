<div class="card mb-3">
    <div class="card-header" style="background-color: #fff;">
        <h3 class="card-title">Download on other websites</h3>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($movie->shkarkolinks as $shiko)
                <button type="button" class="btn btn-outline-warning">
                    <a href="{{ $shiko->web_url }}" target="_blank">
                        {{ $shiko->web_name }}
                    </a> </button>
            @endforeach
        </div>
    </div>
</div>