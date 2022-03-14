<h2 class="widget-title">Ruang Kata</h2>

<ul class="cerpen">
    @if(!empty($kata))
    @foreach($kata as $ruang)
    <li class="cerpen-list">
        <div class="container-cerpen">
            @if($user = $ruang['user'])
            <div class="title-cerpen">
                <h4>
                    <a href="{{ url($ruang['data']->post_name) ?? '' }}">
                        {{ $ruang['data']->post_title ?? '' }}
                    </a>
                </h4>
                <span>
                    <a href="{{ url('author/'.$user['username']) ?? '' }}">
                        {{ $user['name'] ?? '' }}
                    </a>
                </span>
            </div>
            <div class="image-cerpen">
                <img src="{{ $user['image'] ?? '' }}" alt="{{ $user['name'] ?? '' }}">
            </div>
            @else
            <div class="title-cerpen">
                <h4>
                    <a href="{{ url($ruang['data']->post_name) ?? '' }}">
                        {{ $ruang['data']->post_title ?? '' }}
                    </a>
                </h4>
                <span>
                    <a href="{{ url('author/'.getUserName($ruang['data']->post_author)) }}">
                        {{ getAuthor($ruang['data']->post_author) }}
                    </a>
                </span>
            </div>
            <div class="image-cerpen">
                <img src="{{ get_avatar_url($ruang['data']->post_author) }}" alt="{{ get_the_author_meta('first_name', $ruang->post_author) }}">
            </div>
            @endif
        </div>
    </li>
    @endforeach
    @endif
</ul>