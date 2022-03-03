@extends('layouts.main')

@section('content')
@if(have_posts())

<section id="main" class="main layout-citraleka" role="main">
    <div class="container">

        <div class="post-content">

            <article>

                @if(!empty($data))
                <div class="search-list-container">

                    @foreach($data as $flex)
                    <div class="content">
                        <div class="layout-flex">

                            <div class="photo-search flex-2">
                                <div class="box-image">
                                    <img src="{{ getThumnail($flex->ID, 'medium_large') }}" class="attachment-large size-large wp-post-image" alt="{{ $flex->post_title ?? '' }}">
                                </div>
                            </div>

                            <div class="content-search flex-4">
                                <h2 class="title-content">
                                    <a href="{{ url('/'.$flex->post_name) ?? '' }}">
                                        {{ $flex->post_title ?? '' }}
                                    </a>
                                </h2>

                                <h3 class="title-description">
                                    {{ the_excerpt() }}
                                </h3>

                                <div class="top-inner">
                                    <div class="post-byline">By <a href="{{ url('author/'.getAuthor($flex->post_author, 'user_nicename')) }}">{{ getAuthor($flex->post_author) }}</a> on {{ formatDate($flex->post_date) }} |
                                        <p class="post-categories">
                                            <a href="{{ url('category/'.getMetaCategory($flex->ID, 'slug')) }}">
                                                {{ getMetaCategory($flex->ID) }}
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                    </div>

                    @endforeach

                </div>

                @endif
            </article>
        </div>

        {!! get_the_posts_navigation() !!}


    </div>
    </div>

    @else
    @template('parts.content', 'none')
    @endif
    @endsection