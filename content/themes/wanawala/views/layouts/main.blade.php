<!DOCTYPE html>
<html lang="en-US">

<head>

    @include('layouts.meta')
    @include('layouts.css')

</head>
{{ dump($citraleka) }}
<body id="mission-news" class="{{ is_home() || (is_category() && !isset($citraleka)) ? 'blog wp-custom-logo layout-double layout-right-sidebar-wide' : 'post-template-default single single-post single-format-standard wp-custom-logo layout-double layout-no-sidebar-wide' }}">
    <a class="skip-content" href="https://wanawala.com/#main">Press "Enter" to skip to content</a>
    <div id="overflow-container" class="overflow-container">
        <div id="max-width" class="max-width">

            @include('layouts.header')

            <div class="content-container">
                <div class="layout-container">

                    @yield('content')


                </div><!-- layout-container -->
            </div><!-- content-container -->

            @include('layouts.footer')
        </div><!-- .max-width -->
    </div><!-- .overflow-container -->

    <button id="scroll-to-top" class="scroll-to-top"><span class="screen-reader-text">Scroll to the top</span><i class="fas fa-arrow-up"></i></button>
    @footer
</body>

@include('layouts.js')
@include('layouts.script')

@stack('scripts')

</html>