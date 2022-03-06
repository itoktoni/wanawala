<h2 class="widget-title">Nawala terpopuler</h2>

<ul>
    @if(!empty($popular))
    @foreach($popular as $most)
    <li class="post-item has-image">
        <div class="top">
            <div class="top-inner">
                <a href="{{ url($most->post_name) }}" class="title">{{ $most->post_title ?? '' }}</a>
                <h5>{{ the_excerpt() }}</h5>
            </div>

            <div class="featured-image margin-top-15">
                <a href="{{ url($most->post_name) ?? '' }}">
                    <img width="300" height="199" src="{{ getThumnail($most->ID) }}" class="attachment-medium size-medium wp-post-image" alt="{{ $most->post_name ?? '' }}" loading="lazy">
                </a>
            </div>

            <div class="top-inner">
                <div class="post-byline">By <a href="{{ url('author/'.getAuthor($most->post_author, 'user_nicename')) }}">{{ getAuthor($most->post_author) }}</a> on {{ formatDate($most->post_date) }} |
                    <p class="post-categories">
                        <a href="{{ url('category/'.getMetaCategory($most->ID, 'slug')) }}">
                            {{ getMetaCategory($most->ID) }}
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </li>
    @endforeach
    @endif
</ul>