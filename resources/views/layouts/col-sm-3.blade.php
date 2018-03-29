
    <div class="imageBox">
        @if(count($movie->photos) > 0)
            <img style="width: 100%" src="{{ asset('storage').$movie->photos->first()->threezerozero }}" alt="Card image cap">
        @endif
            <div class="top-left">
                @foreach($movie->genres as $genre)
                    <a href="{{ url('/genres/'. $genre->slug) }}" >
                        {{ $genre->genre_type }}
                    </a>
                @endforeach
            </div>
            <div class="top-right">
                {{ date('Y', strtotime($movie->release_date)) }}
            </div>
        <h3>
            <a href="{{ url('/movies/'. $movie->slug) }}">
               {{ $movie->title }}
            </a>
        </h3>
        <ul>
            <li><a href=""><i class="fa fa-eye"
                 aria-hidden="true"></i> </a>
            </li>
            <li><a href=""><i class="fa fa-facebook"
                aria-hidden="true"></i> </a>
            </li>
            <li><a href=""><i class="fa fa-twitter"
                aria-hidden="true"></i> </a>
            </li>
            <li><a href=""><i class="fa fa-instagram"
                  aria-hidden="true"></i> </a>
            </li>
            <li><a href=""><i class="fa fa-youtube"
                   aria-hidden="true"></i> </a>
            </li>
        </ul>
    </div>
