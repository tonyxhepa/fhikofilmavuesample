<!--Card-->
<div class="col-sm-6 col-md-3">
    <div class="card mb-3">
        <!--Card image-->
        <div class="imageBox view zoom">
            @if(count($movie->photos) > 0)
                <img class="card-img-top" src="{{ asset('storage').$movie->photos->first()->threezerozero }}" alt="Card image cap">
            @endif
            <div class="top-left">
                @foreach($movie->genres as $genre)
                    <a href="" >
                        {{ $genre->genre_type }}
                    </a>
                @endforeach
            </div>
            <div class="top-right">
                {{ date('Y', strtotime($movie->release_date)) }}
            </div>
            <h3>
                <a href="{{ url('/'. $movie->slug) }}">
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
        <!--Card content-->

    </div>
</div>

<!--/.Card-->