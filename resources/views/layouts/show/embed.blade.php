<div class="embed-responsive embed-responsive-16by9 mb-3">
    @foreach($movie->embeds as $embed)
        <iframe class="embed-responsive-item" src="{{ $embed->web_url }}" allowfullscreen></iframe>
    @endforeach
</div>