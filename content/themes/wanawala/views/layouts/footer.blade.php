<footer id="site-footer" class="site-footer" role="contentinfo">

    <div id="menu-footer-container" class="menu-footer-container menu-footer-nav">
        <div id="menu-footer" class="menu-container menu-footer" role="navigation">
            <nav class="menu">
                {!! wp_nav_menu([
                'theme_location' => 'footer-menu',
                'menu_id' => 'menu-footer-items',
                'menu_class' => 'menu-footer-items',
                'echo' => false
                ]) !!}
            </nav>
        </div>
    </div>

    <div class="footer-title-container">
    </div>

    <div id="menu-footer-container" class="menu-footer-container">
        <div id="menu-footer" class="menu-container menu-footer" role="navigation">
            <nav class="menu">
                {!! wp_nav_menu([
                'theme_location' => 'social-menu',
                'menu_id' => 'menu-footer-items',
                'menu_class' => 'menu-footer-items',
                'echo' => false
                ]) !!}
            </nav>
        </div>
    </div>
    <div class="design-credit">
        <span>
            <a href="{{ url('/') }}">&copy; {{ date('Y') }} Wanawala</a><br>
            <a href="https://www.competethemes.com/mission-news/" rel="nofollow"> by Compete Themes.</a>
        </span>
    </div>
</footer>