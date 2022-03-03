<header class="site-header" id="site-header" role="banner">

    <div class="top-nav hide">
        <button id="search-toggle" class="search-toggle"><i class="fas fa-search"></i><span>Search</span></button>
        <div id="search-form-popup" class="search-form-popup">
            <div class="inner">
                <div class="title">Search Wanawala.com</div>
                <div class="search-form-container">
                    <form role="search" method="get" class="search-form" action="https://wanawala.com/" data-hs-cf-bound="true">
                        <input id="search-field" type="search" class="search-field" value="" name="s" title="Search" placeholder=" Search for...">
                        <input type="submit" class="search-submit" value="Search">
                    </form>
                </div> <a id="close-search" class="close" href="https://wanawala.com/#"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g transform="translate(-17.000000, -12.000000)" fill="#000000">
                                <g transform="translate(17.000000, 12.000000)">
                                    <rect transform="translate(10.000000, 10.000000) rotate(45.000000) translate(-10.000000, -10.000000) " x="9" y="-2" width="2" height="24"></rect>
                                    <rect transform="translate(10.000000, 10.000000) rotate(-45.000000) translate(-10.000000, -10.000000) " x="9" y="-2" width="2" height="24"></rect>
                                </g>
                            </g>
                        </g>
                    </svg></a>
            </div>
        </div>
        <div id="menu-secondary-container" class="menu-secondary-container">
            <div id="menu-secondary" class="menu-container menu-secondary" role="navigation">
                <nav class="menu">
                    <ul id="menu-secondary-items" class="menu-secondary-items">
                        <li id="menu-item-98" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-98"><a href="https://wanawala.com/tentang-kami/">Tentang Kami</a></li>
                        <li id="menu-item-96" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-96"><a href="https://wanawala.com/pedoman-media-siber/">Pedoman Media Siber</a>
                        </li>
                        <li id="menu-item-97" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-97"><a href="https://wanawala.com/hubungi-kami/">Hubungi Kami</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div id="title-container" class="title-container">
        <div class="site-title no-date">
            <a href="{{ url('') }}" class="custom-logo-link" rel="home">
                <img width="500" height="100" src="{{ getLogo() }}" class="custom-logo" alt="Wanawala.com">
            </a>
        </div>
    </div>

    <button id="toggle-navigation" class="toggle-navigation" name="toggle-navigation" aria-expanded="false">
        <span class="screen-reader-text">open menu</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="18" viewBox="0 0 24 18" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-272.000000, -21.000000)" fill="#000000">
                    <g transform="translate(266.000000, 12.000000)">
                        <g transform="translate(6.000000, 9.000000)">
                            <rect class="top-bar" x="0" y="0" width="24" height="2"></rect>
                            <rect class="middle-bar" x="0" y="8" width="24" height="2"></rect>
                            <rect class="bottom-bar" x="0" y="16" width="24" height="2"></rect>
                        </g>
                    </g>
                </g>
            </g>
        </svg>
    </button>

    <div id="menu-primary-container" class="menu-primary-container tier-1" style="top: auto;">
        <div class="dropdown-navigation"><a id="back-button" class="back-button" href="https://wanawala.com/#"><i class="fas fa-angle-left"></i> Back</a><span class="label"></span></div>
        <div id="menu-primary" class="menu-container menu-primary" role="navigation">
            <nav class="menu">
                {!! wp_nav_menu([
                'theme_location' => 'top-menu',
                'menu_id' => 'menu-primary-items',
                'menu_class' => 'menu-primary-items',
                'echo' => false
                ]) !!}
            </nav>
        </div>
    </div>

</header>