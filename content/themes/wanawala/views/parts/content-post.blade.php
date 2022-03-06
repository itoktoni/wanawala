<section id="main" class="main single-section blog-section" role="main">
    <div id="loop-container" class="loop-container single-container">
        <div class="post type-post status-publish format-standard has-post-thumbnail hentry entry">
            <article>

                <div class="post-header">
                    <h1 class="post-title">
                        <a href="{{ url($post->post_name) ?? '' }}">
                            {{ $post->post_title ?? '' }}
                        </a>
                    </h1>
                    <div class="post-byline">By <a href="{{ url('author/'.getAuthor($post->post_author, 'user_nicename')) }}">{{ getAuthor($post->post_author) }}</a> on {{ formatDate($post->post_date) }} |
                        <p class="post-categories">
                            <span class="post-categories">
                                <a href="{{ url('category/'.getMetaCategory($post->ID, 'slug')) }}">
                                    {{ getMetaCategory($post->ID) }}
                                </a>
                            </span>
                        </p>
                    </div>

                </div>
                <div class="post-content">

                    @if(!empty($gallery))
                    <div class="gallery">
                        <hr>
                        <div class="slider slider-single">

                            @foreach($gallery as $citra)
                            <div class="container-images">
                                <div class="slider-images">
                                    <img src="{{ $citra->photo_image->url ?? '' }}" alt="">
                                </div>
                                <p>{{ $citra->photo_caption ?? '' }}</p>
                            </div>
                            @endforeach
                        </div>

                        <hr style="margin-top:-10px">

                        <div class="slider slider-nav">
                            @foreach($gallery as $citra)
                            <div>
                                <div class="slider-images slider-item">
                                    <span>
                                        <img src="{{ $citra->photo_image->sizes->medium ?? '' }}" alt="">
                                    </span>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>

                    @else

                    <div class="hero-image">
                        <img src="{{ getThumnail($post->ID, 'large') }}" class="attachment-large size-large wp-post-image" alt="{{ $post->post_title ?? '' }}">
                        <div class="caption">{{ getCaptionImage($post->ID) }}</div>
                    </div>

                    <h2 class="post-title">
                        <strong>{{ get_field('headline', $post->ID) ?? '' }}</strong>
                    </h2>

                    @if(!empty(get_field('list_headline', $post->ID)))
                    <ul>
                        @foreach(get_field('list_headline', $post->ID) as $hero_sub)
                        <li>
                            <h3>{{ $hero_sub['description'] ?? '' }}</h3>
                        </li>
                        @endforeach
                    </ul>
                    @endif

                    @endif

                    <div class="content">
                        {!! Loop::content() !!}
                    </div>

                    <div class="post-content">
                        <div class="post-meta">
                            @if(!empty(get_field('editorial', $post->ID)))
                            <h5 class="team">Editorial Team</h5>
                            @foreach(get_field('editorial', $post->ID) as $editor)
                            <div class="post-author">
                                <div class="avatar-container">
                                    <img class="avatar-image" src="{{ get_avatar_url($editor['author_user']->ID) }}" alt="{{ get_the_author_meta('first_name', $editor['author_user']->ID) }}">
                                </div>
                                <div>
                                    <span class="author">
                                        <a href="{{ url('author/'.get_the_author_meta('nickname', $editor['author_user']->ID)) ?? '' }}">
                                            {{ get_the_author_meta('first_name', $editor['author_user']->ID) }}
                                        </a>
                                    </span>
                                    <p>{{ $editor['author_job'] ?? '' }}</p>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    @if(comments_open() || get_comments_number())
                    @php(comments_template('/views/comments/template.php'))
                    @endif

                    <hr>

                    <div class="post-content">

                        <h3><strong>Related</strong></h3>
                        <div class="layout-flex carousel">

                            @if($recomendation = getPopular())
                            @foreach($recomendation as $recomend)
                            <div class="content">

                                <div class="box">

                                    <div class="box-image">
                                        <a href="{{ url('/'.$recomend->post_name) ?? '' }}">
                                            <img src="{{ getThumnail($recomend->ID, 'medium_large') }}" class="attachment-large size-large wp-post-image" alt="{{ $recomend->post_title ?? '' }}">
                                        </a>
                                    </div>
                                    <h5 class="slick-title">
                                        <a href="{{ url('/'.$recomend->post_name) ?? '' }}">
                                            {{ $recomend->post_title ?? '' }}
                                        </a>
                                    </h5>
                                </div>

                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="post-meta">
                        <p class="post-categories">
                            <span>Published in</span>
                            <a href="{{ url('category/'.getMetaCategory($post->ID, 'slug')) }}" title="View all posts in Aktual">
                                {{ getMetaCategory($post->ID) }}
                            </a>
                        </p>
                        <div class="post-tags">
                            <ul>
                                @if(get_the_tags($post->ID))
                                @foreach(get_the_tags($post->ID) as $tag)
                                <li>
                                    <a href="{{ url('tag/'.$tag->slug) ?? '' }}" title="View all posts tagged arkeologi">
                                        {{ $tag->name ?? '' }}
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>


                    </div>

            </article>
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function() {

        $('.slider-single').each(function() {
            var slider = $(this);
            slider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: false,
                arrows: false,
                infinite: true
            });

            // var sLightbox = $(this);
            // sLightbox.slickLightbox({
            //     src: 'src',
            //     itemSelector: '.slider-images img'
            // });
        });

        $('.slider-nav')
            .on('init', function(event, slick) {
                $('.slider-nav .slick-slide.slick-current').addClass('is-active');
            })
            .slick({
                slidesToShow: 5,
                slidesToScroll: 5,
                dots: true,
                arrows: false,
                focusOnSelect: false,
                infinite: false,
                responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                    }
                }, {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4,
                    }
                }, {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                    }
                }]
            });

        $('.slider-single').on('afterChange', function(event, slick, currentSlide) {
            $('.slider-nav').slick('slickGoTo', currentSlide);
            var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
            $('.slider-nav .slick-slide.is-active').removeClass('is-active');
            $(currrentNavSlideElem).addClass('is-active');
        });

        $('.slider-nav').on('click', '.slick-slide', function(event) {
            event.preventDefault();
            var goToSingleSlide = $(this).data('slick-index');

            $('.slider-single').slick('slickGoTo', goToSingleSlide);
        });

    });
</script>
@endpush