<div class="content margin-10">

    <h2 class="title-content">
        <a href="{{ esc_url(get_permalink()) }}">
            {!! Loop::title() !!}
        </a>
    </h2>

    <h3 class="title-description margin-top-15">
        {{ the_excerpt() }}
    </h3>

</div>