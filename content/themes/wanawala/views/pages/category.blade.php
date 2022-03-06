@extends('layouts.main')

@section('content')
@if(have_posts())

<section id="main" class="main" role="main">

    <div id="loop-container" class="loop-container">
        <div class="post type-post status-publish format-standard has-post-thumbnail entry">
            <article>
                <div class="post-header">
                    <h1 class="post-title">
                        <a href="{{ url($post->post_name) ?? '' }}">
                            {{ $post->post_title ?? '' }}
                        </a>
                    </h1>
                    <div class=" post-byline">By <a href="{{ url('author/'.getAuthor($post->post_author, 'user_nicename')) }}">{{ getAuthor($post->post_author) }}</a> on {{ formatDate($post->post_date) }} |
                        <p class="post-categories">
                            <a href="{{ url('category/'.getMetaCategory($post->ID, 'slug')) }}">
                                {{ getMetaCategory($post->ID) }}
                            </a>
                        </p>
                    </div>
                </div>
                <div class="featured-image">
                    <a href="{{ url($post->post_name) ?? '' }}">
                        <img src="{{ getThumnail($post->ID, 'large') }}" class="attachment-large size-large wp-post-image" alt="nisan kuno">
                    </a>
                </div>
                <div class="post-content">
                    <a href="{{ url($post->post_name) ?? '' }}">
                        <ul>
                            @if(!empty(get_field('list_headline', $post->ID)))
                            @foreach(get_field('list_headline', $post->ID) as $hero_sub)
                            <li>
                                <h2>{{ $hero_sub['description'] ?? '' }}</h2>
                            </li>
                            @endforeach
                            @endif
                        </ul>

                        <div class="more-link-wrapper">
                            <a class="more-link" href="{{ url('/'.$post->post_name) ?? '' }}">
                                Read more...
                            </a>
                        </div>
                    </a>
                </div>
            </article>
        </div>

    </div>

    <div id="loop-container" class="loop-container loop-custom">

        <div class="post type-post status-publish format-standard layout-block">

            <article class="border-bottom">
                <div class="post-header">
                    <h3 class="post-title title-category">
                        <a href="{{ url('category/'.getMetaCategory($post->ID, 'slug')) }}">
                            {{ Ucfirst(getMetaCategory($post->ID)) }}
                        </a>
                    </h3>
                </div>
            </article>

            <article>

                @if(!empty($data))
                @foreach($data as $split)
                <div class="post-content background-smoke padding-10 margin-top-15">
                    <div class="layout-flex">

                        @foreach($split as $flex)
                        <div class="content margin-10">

                            <h2 class="title-content">
                                <a href="{{ url('/'.$flex->post_name) ?? '' }}">
                                    {{ $flex->post_title ?? '' }}
                                </a>
                            </h2>

                            <h3 class="title-description margin-top-15">
                                <a href="{{ url('/'.$flex->post_name) ?? '' }}">
                                    {{ the_excerpt() }}
                                </a>
                            </h3>

                        </div>
                        @endforeach

                    </div>
                </div>
                @endforeach
                @endif

                {!! get_the_posts_navigation() !!}

            </article>
        </div>
    </div>

</section>

@include('pages.sidebar')

@else
@template('parts.content', 'none')
@endif
@endsection