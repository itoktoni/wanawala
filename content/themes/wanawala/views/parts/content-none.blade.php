<div class="page-content page-404">
    <div class="container blog-posts post-single">
        <div class="row fixed">

            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title">{{ esc_html__('Nothing Found', THEME_TD) }}</h1>
                </header><!-- .page-header -->
                <div class="">
                    @if(is_home() && current_user_can('publish_posts'))
                    <p>
                        {!! sprintf(
                        wp_kses(
                        __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', THEME_TD),
                        [
                        'a' => [
                        'href' => []
                        ]
                        ]
                        ),
                        esc_url(admin_url('post-new.php'))
                        ) !!}
                    </p>
                    @elseif(is_search())
                    <p>{{ esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', THEME_TD) }}</p>
                   
                    <form action="{{ url('/') }}" class="form-submit layout-flex" method="GET">
                        <input class="a_search" name="s" type="text" placeholder="Type and hit enter..." />
                        <button class="search-submit" type="submit">Search</button>
                    </form>

                    @else
                    <p>{{ get_option('error') }}</p>
                   
                    <form action="{{ url('/') }}" class="form-submit layout-flex" method="GET">
                        <input class="a_search" name="s" type="text" placeholder="Type and hit enter..." />
                        <button class="search-submit" type="submit">Search</button>
                    </form>

                    @endif
                </div><!-- .page-content -->
            </section><!-- .no-results -->

        </div>
    </div>
</div>