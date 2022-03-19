<section id="main" class="main single-section blog-section" role="main">
    <div id="loop-container" class="loop-container single-container">
        <div class="post type-post status-publish format-standard has-post-thumbnail hentry entry">
            <article>

                <div class="post-header">
                    <h1 class="post-title">
                        <a href="{{ url($post->post_name) ?? '' }}">
                            {{ $post->post_title ?? '' }}
                        </a>
                    </h1>
                </div>

                <div class="post-content">

                    <div class="content block-content">
                        {!! Loop::content() !!}
                    </div>

                    @if(!empty($template))
                    <div class="container-template">
                        @foreach($template as $theme)
                        <div class="template">
                            @includeIf('partial._'.$theme->acf_fc_layout, ['data' => $theme])
                        </div>
                        @endforeach
                    </div>
                    @endif

                </div>

            </article>
        </div>
    </div>
</section>