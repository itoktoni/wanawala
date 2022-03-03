<li class="blog-post clearfix isotope-item page-thumbnail">

    <div class="thumbnail-header">
        <a href="{{ esc_url(get_permalink()) }}">
            <h3>{!! Loop::title() !!}</h3>
        </a>

        <p>
            {!! Loop::excerpt() !!}
        </p>

    </div><!-- .post-body end -->

    <div class="image">
        <a href="news-single.html" class="">
            <img src="{{ Loop::thumbnailUrl('') }}" alt="{!! Loop::title() !!}" />
        </a>
    </div><!-- .post-media end -->

    <div class="thumbnail-footer">
        {!! posted_on() !!}

        <a href="{{ esc_url(get_permalink()) }}" class="read-more">
            <span>
                Read more
                <i class="fa fa-external-link"></i>
            </span>
        </a>
    </div><!-- .post-meta end -->
</li><!-- .blog-post end -->