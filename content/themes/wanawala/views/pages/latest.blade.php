<h2 class="widget-title">Nawala Teranyar</h2>
<ul>
    @if(!empty($latest))
    @foreach($latest as $new)
    <li class="post-item has-image">
        <div class="top">
            <div class="top-inner">
                <a href="{{ url($new->post_name) }}" class="title">
                    {{ $new->post_title ?? '' }}
                </a>

                <h5>
                    <a href="{{ url($new->post_name) }}">
                        {{ !empty(get_field('headline', $new->ID)) ? substr(get_field('headline', $new->ID),0,120).'[...]' : the_excerpt() }}
                    </a>
                </h5>
            </div>

            <div class="featured-image margin-top-15">
                <a href="{{ url($new->post_name) ?? '' }}">
                    <img width="300" height="199" src="{{ getThumnail($new->ID) }}" class="attachment-medium size-medium wp-post-image" alt="{{ $new->post_name ?? '' }}" loading="lazy">
                </a>
            </div>

            <div class="top-inner">
                <div class="post-byline">By <a href="{{ url('author/'.getAuthor($new->post_author, 'user_nicename')) }}">{{ getAuthor($new->post_author) }}</a> on {{ formatDate($new->post_date) }} |
                    <p class="post-categories">
                        <a href="{{ url('category/'.getMetaCategory($new->ID, 'slug')) }}">
                            {{ getMetaCategory($new->ID) }}
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </li>
    @endforeach
    @endif
</ul>