<h2 class="widget-title">Ruang Kata</h2>

<ul class="cerpen">
    @if(!empty($kata))
    @foreach($kata as $ruang)
    <li class="cerpen-list">
        <div class="container-cerpen">
            <div class="title-cerpen">
                <h4>
                    <a href="{{ url($ruang->post_name) ?? '' }}">
                        {{ $ruang->post_title ?? '' }}
                    </a>
                </h4>
                <span><a href="{{ url('author/'.get_the_author_meta('nickname', $post->post_author)) ?? '' }}">{{ get_the_author_meta('first_name', $post->post_author) }}</a></span>
            </div>
            <div class="image-cerpen">
                <img src="{{ get_avatar_url($ruang->post_author) }}" alt="{{ get_the_author_meta('first_name', $post->post_author) }}">
            </div>
        </div>
    </li>
    @endforeach
    @endif
</ul>