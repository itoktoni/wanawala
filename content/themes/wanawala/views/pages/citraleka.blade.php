@extends('layouts.main')

@section('content')
@if(have_posts())

<section id="main" class="main layout-citraleka" role="main">

    <div class="layout-flex">
        <div class="hero-image flex-5">
            <div class="featured-image">
                <a href="{{ url('/'.$post->post_name) ?? '' }}">
                    <img src="{{ getThumnail($post->ID, 'large') }}" class="attachment-large size-large wp-post-image" alt="nisan kuno">
                </a>
            </div>
            <div class="post-thumbnail">
                <div class="post-header">
                    <h1 class="post-title">
                        <a href="{{ url($post->post_name) ?? '' }}">
                            Foto : {{ $post->post_title ?? '' }}
                        </a>
                    </h1>
                    <div class=" post-byline">By
                        <a href="{{ url('author/'.getAuthor($post->post_author, 'user_nicename')) }}">
                            {{ getAuthor($post->post_author) }}</a>
                        on {{ formatDate($post->post_date) }}

                    </div>
                </div>
            </div>
        </div>

        <div class="split-two flex-2">
            @if(!empty($latest))
            @foreach($latest as $split)
            <div class="featured-image">
                <a href="{{ url('/'.$split->post_name) ?? '' }}">
                    <img src="{{ getThumnail($split->ID, 'large') }}" class="attachment-large size-large wp-post-image" alt="nisan kuno">
                </a>
                <div class="post-header">
                    <h5 class="post-title">
                        <a href="{{ url($split->post_name) ?? '' }}">
                            Foto : {{ $split->post_title ?? '' }}
                        </a>
                    </h5>
                    <div class=" post-byline">By
                        <a href="{{ url('author/'.getAuthor($split->post_author, 'user_nicename')) }}">
                            {{ getAuthor($split->post_author) }}</a>
                        on {{ formatDate($split->post_date) }}

                    </div>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>

    @if(!empty($data))
    @foreach($data as $box)
    <div class="split-four layout-flex">
        @foreach($box as $citra)
        <div class="featured-image">
            <a href="{{ url('/'.$citra->post_name) ?? '' }}">
                <img src="{{ getThumnail($citra->ID, 'large') }}" class="attachment-large size-large wp-post-image" alt="nisan kuno">
            </a>
            <div class="post-header">
                <h5 class="post-title">
                    <a href="{{ url($citra->post_name) ?? '' }}">
                        Foto : {{ $citra->post_title ?? '' }}
                    </a>
                </h5>
                <div class=" post-byline">By
                    <a href="{{ url('author/'.getAuthor($citra->post_author, 'user_nicename')) }}">
                        {{ getAuthor($citra->post_author) }}</a>
                    on {{ formatDate($citra->post_date) }}

                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endforeach
    @endif

    {!! get_the_posts_navigation() !!}

</section>


@else
@template('parts.content', 'none')
@endif
@endsection