<aside class="sidebar sidebar-right" id="sidebar-right" role="complementary">
    <div class="inner">
        <section id="ct_mission_news_post_list-2" class="widget widget_ct_mission_news_post_list">
            <div class="style-1">

                <div class="search-container">
                    <form role="search" method="get" class="search-form" action="" data-hs-cf-bound="true">
                        <input id="search-field" type="search" class="search-field" value="" name="s" title="Search" placeholder=" Search for...">
                        <input type="submit" class="search-submit" value="Search">
                    </form>
                </div>

                @include('pages.latest')
                @include('pages.ruang')
                @include('pages.tag')
                @include('pages.popular')

                @if(is_active_sidebar('sidebar-1'))
                <div id="secondary" class="widget-area">
                    @php(dynamic_sidebar('sidebar-1'))
                </div>
                @endif

            </div>
        </section>
    </div>
</aside>