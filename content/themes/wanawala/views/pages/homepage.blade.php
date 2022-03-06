@extends('layouts.main')

@section('content')

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

        <div class="post type-post status-publish format-standard layout-block">
            <article>
                <div class="post-content background-smoke padding-10">

                    <div class="post-header">
                        <h3 class="post-title post-category">
                            <a href="{{ url('/category/citraleka') }}">Citraleka</a>
                        </h3>
                        <a class="post-description" href="{{ url('/category/citraleka') }}">See more gallery</a>
                    </div>

                    <div class="layout-flex citraleka carousel">
                        @if(!empty($citraleka))
                        @foreach($citraleka as $citra)
                        <div class="content margin-10">
                            <a href="{{ url('/'.$citra->post_name) ?? '' }}">
                                <img src="{{ getThumnail($citra->ID, 'medium') }}" alt="{{ $citra->post_title }}">
                                <h4 class="title-description">
                                    <a href="{{ url('/'.$citra->post_name) ?? '' }}">
                                        {{ $citra->post_title ?? '' }}
                                    </a>
                                </h4>
                            </a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </article>
        </div>
    </div>

    <div id="loop-container" class="loop-container loop-custom">

        <div class="post type-post status-publish format-standard layout-block">

            <article class="border-bottom">
                <div class="post-header">
                    <h3 class="post-title title-category">
                        <a href="{{ url('category/aktual') }}">Aktual</a>
                    </h3>
                </div>
            </article>

            <article>

                <div class="post-content">
                    <div class="layout-flex">
                        <div class="post-header flex-1 post-article">
                            <h2 class="post-title post-title-category">
                                <a href="{{ url('/'.$actual[0]->post_name) ?? '' }}" class="title-content">
                                    {{ $actual[0]->post_title ?? '' }}
                                </a>
                            </h2>

                            <div class="title-secondary">
                                <a href="{{ url('/'.$actual[0]->post_name) ?? '' }}">
                                    <ul>
                                        @if(!empty(get_field('list_headline', $actual[0]->ID)))
                                        @foreach(get_field('list_headline', $actual[0]->ID) as $actual_sub)
                                        <li>
                                            <h2>{{ $actual_sub['description'] ?? '' }}</h2>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>

                                    <div class="more-link-wrapper">
                                        <a class="more-link" href="{{ url('/'.$actual[0]->post_name) ?? '' }}">
                                            Read more...
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="post-image flex-1">
                            <div class="featured-image feature-list-image">
                                <a href="{{ url('/'.$actual[0]->post_name) ?? '' }}">
                                    <img src="{{ getThumnail($actual[0]->ID, 'medium_large') }}" class="attachment-large size-large wp-post-image" alt="{{ $actual[0]->post_title ?? '' }}">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="post-content background-smoke padding-10">
                    <div class="layout-flex">
                        @if(!empty($actual))
                        @php
                        if(count($actual) > 3)
                        unset($actual[0])
                        @endphp
                        @foreach($actual as $actual_sub)
                        <div class="content margin-10">

                            <h2 class="title-content">
                                <a href="{{ url('/'.$actual_sub->post_name) ?? '' }}">
                                    {{ $actual_sub->post_title ?? '' }}
                                </a>
                            </h2>

                            <h3 class="title-description margin-top-15">
                                <a href="{{ url('/'.$actual_sub->post_name) ?? '' }}">
                                    {{ the_excerpt() }}
                                </a>
                            </h3>

                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </article>
        </div>
    </div>

    <div id="loop-container" class="loop-container loop-custom">

        <div class="post type-post status-publish format-standard layout-block">

            <article class="border-bottom">
                <div class="post-header">
                    <h3 class="post-title title-category">
                        <a href="{{ url('category/sigi') }}">Sigi</a>
                    </h3>
                </div>
            </article>

            <article>

                <div class="post-content">
                    <div class="layout-flex">
                        <div class="post-header flex-1 post-article">
                            <h2 class="post-title post-title-category">
                                <a href="{{ url('/'.$sigi[0]->post_name) ?? '' }}" class="title-content">
                                    {{ $sigi[0]->post_title ?? '' }}
                                </a>
                            </h2>

                            <div class="title-secondary">
                                <a href="{{ url('/'.$sigi[0]->post_name) ?? '' }}">

                                    <ul>
                                        @if(!empty(get_field('list_headline', $sigi[0]->ID)))
                                        @foreach(get_field('list_headline', $sigi[0]->ID) as $sigi_sub)
                                        <li>
                                            <h2>{{ $sigi_sub['description'] ?? '' }}</h2>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>

                                    <div class="more-link-wrapper">
                                        <a class="more-link" href="{{ url('/'.$sigi[0]->post_name) ?? '' }}">
                                            Read more...
                                        </a>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="post-image flex-1">
                            <div class="featured-image feature-list-image">
                                <a href="{{ url('/'.$sigi[0]->post_name) ?? '' }}">
                                    <img src="{{ getThumnail($sigi[0]->ID, 'medium_large') }}" class="attachment-large size-large wp-post-image" alt="{{ $sigi[0]->post_title ?? '' }}">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="post-content background-smoke padding-10">
                    <div class="layout-flex">
                        @if(!empty($sigi))
                        @php
                        if(count($sigi) > 3)
                        unset($sigi[0])
                        @endphp
                        @foreach($sigi as $sigi_sub)
                        <div class="content margin-10">

                            <h2 class="title-content">
                                <a href="{{ url('/'.$sigi_sub->post_name) ?? '' }}">
                                    {{ $sigi_sub->post_title ?? '' }}
                                </a>
                            </h2>

                            <h3 class="title-description margin-top-15">
                                <a href="{{ url('/'.$sigi_sub->post_name) ?? '' }}">
                                    {{ the_excerpt() }}
                                </a>
                            </h3>

                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </article>
        </div>
    </div>

    <div id="loop-container" class="loop-container loop-custom">

        <div class="post type-post status-publish format-standard layout-block">

            <article class="border-bottom">
                <div class="post-header">
                    <h3 class="post-title title-category">
                        <a href="{{ url('category/cek-fakta') }}">Cek Fakta</a>
                    </h3>
                </div>
            </article>

            <article>

                <div class="post-content">
                    <div class="layout-flex">
                        <div class="post-header flex-1 post-article">
                            <h2 class="post-title post-title-category">
                                <a href="{{ url('/'.$fakta[0]->post_name) ?? '' }}" class="title-content">
                                    {{ $fakta[0]->post_title ?? '' }}
                                </a>
                            </h2>

                            <div class="title-secondary">
                                <a href="{{ url('/'.$fakta[0]->post_name) ?? '' }}">

                                    <ul>
                                        @if(!empty(get_field('list_headline', $fakta[0]->ID)))
                                        @foreach(get_field('list_headline', $fakta[0]->ID) as $fakta_sub)
                                        <li>
                                            <h2>{{ $fakta_sub['description'] ?? '' }}</h2>
                                        </li>
                                        @endforeach
                                        @endif
                                    </ul>

                                    <div class="more-link-wrapper">
                                        <a class="more-link" href="{{ url('/'.$fakta[0]->post_name) ?? '' }}">
                                            Read more...
                                        </a>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="post-image flex-1">
                            <div class="featured-image feature-list-image">
                                <a href="{{ url('/'.$fakta[0]->post_name) ?? '' }}">
                                    <img src="{{ getThumnail($fakta[0]->ID, 'medium_large') }}" class="attachment-large size-large wp-post-image" alt="{{ $fakta[0]->post_title ?? '' }}">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="post-content background-smoke padding-10">
                    <div class="layout-flex">
                        @if(!empty($fakta))
                        @php
                        if(count($fakta) > 3)
                        unset($fakta[0])
                        @endphp
                        @foreach($fakta as $fakta_sub)
                        <div class="content margin-10">

                            <h2 class="title-content">
                                <a href="{{ url('/'.$fakta_sub->post_name) ?? '' }}">
                                    {{ $fakta_sub->post_title ?? '' }}
                                </a>
                            </h2>

                            <h3 class="title-description margin-top-15">
                                <a href="{{ url('/'.$fakta_sub->post_name) ?? '' }}">
                                    {{ the_excerpt() }}
                                </a>
                            </h3>

                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>

            </article>
        </div>
    </div>

</section> <!-- .main -->

@include('pages.sidebar')

@endsection