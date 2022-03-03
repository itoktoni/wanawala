@extends('layouts.main')

@section('content')

<div class="page-content page-404">
    <div class="container blog-posts post-single">
        <div class="row fixed">

            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title">{!! esc_html__('Oops! That page can&rsquo;t be found.', THEME_TD) !!}</h1>
                </header><!-- .page-header -->
                <div class="">
                    <p>{{ esc_html__('It looks like nothing was found at this location. Maybe try one of the links below or a search?', THEME_TD) }}</p>

                    <form action="{{ url('/') }}" class="form-submit" method="GET">
                        <input class="a_search" name="s" type="text" placeholder="Type and hit enter..." />
                        <button type="submit">Search</button>
                    </form>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            @php(the_widget('WP_Widget_Recent_Posts'))
                        </div>
                        <div class="col-md-4">
                            <div class="widget widget_categories">
                                <h2 class="widget-title">{{ esc_html__('Most Used Categories', THEME_TD) }}</h2>
                                <ul>
                                    {!! wp_list_categories([
                                    'order' => 'DESC',
                                    'show_count' => 0,
                                    'title_li' => '',
                                    'number' => 10,
                                    'echo' => false
                                    ]) !!}
                                </ul>
                            </div><!-- .widget -->
                        </div>
                        <div class="col-md-4">
                            @php(the_widget('WP_Widget_Tag_Cloud'))
                        </div>
                    </div>


                </div>
            </section><!-- .no-results -->

        </div>
    </div>
</div>

@endsection