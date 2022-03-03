@extends('layouts.main')

@section('content')

@if($data->have_posts())

<div class="page-content page-post page-search page-blog">
    <div class="container">

        <div class="fixed">

            <div class="row col-md-12 searching">

                <div class="col-md-8">
                    <div class="title">
                        <h3>Category</h3>

                    </div>
                    <ul class="search">
                        @if($category)
                        @foreach($category as $cat)
                        <li>
                            <a class="btn btn-xs btn-primary" href="{{ url('/category/'.$cat->slug) }}">
                                {{ $cat->cat_name ?? '' }}
                            </a>
                        </li>
                        @endforeach
                        @endif
                    </ul>

                </div>

                <div class="col-md-4">
                    <div id="search-2" class="widget_search clearfix">
                        <div class="title-right">
                            <h3>
                                Search
                                @if(request()->get('s'))
                                {!! sprintf(esc_html__(' : %s', THEME_TD), '<span>'.get_search_query().'</span>') !!}
                                @endif
                            </h3>
                        </div>

                        <form action="{{ url('/') }}" method="GET">
                            <input class="a_search" name="s" type="text" placeholder="Type and hit enter..." />
                            <input class="search-submit" type="submit" />
                        </form>

                    </div>
                </div>

            </div>

        </div>

        <div class="row content">
            <div class="col-md-12 mt-1">
                {!! Loop::content() !!}
            </div>
        </div>

        <div class="row mt-1">
            <div class="blog-posts post-list">

                <ul class="blog-posts isotope masonry">
                    @while($data->have_posts())
                    @php($data->the_post())
                    @template('parts.content', 'thumbnail')
                    @endwhile
                </ul>

            </div>
        </div>
    </div>
</div>

@else
@template('parts.content', 'none')
@endif
@endsection