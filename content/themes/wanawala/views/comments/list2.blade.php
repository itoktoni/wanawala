<div id="comments" class="comments-area">
    @if(have_comments())
    <h2 class="comments-title">{!! comments_title(get_comments_number()) !!}</h2>
    {!! get_the_comments_navigation() !!}
    <ol class="comment-list">
        {!! wp_list_comments([
        'style' => 'ol',
        'short_ping' => true,
        'echo' => false
        ]) !!}
    </ol>
    {!! get_the_comments_navigation() !!}

    @unless(comments_open())
    <p class="no-comments">{{ esc_html__('Comments are closed.', THEME_TD) }}</p>
    @endunless
    @endif
    @php(comment_form())
</div><!-- #comments -->

@if(have_comments())
<div class="post-comments">
    <div class="custom-heading">
        <h3>Comments</h3>
    </div>

    <ul class="comments-li">

        {!! wp_list_comments([
        'style' => 'ul',
        'short_ping' => true,
        'echo' => false
        ]) !!}

        <li>
            <div class="comment">
                <div class="avatar">
                    <img src="img/blog/avatar01.png" alt="author" />
                </div>

                <ul class="comment-meta">
                    <li>
                        <a href="#" class="author">Mila Curtis</a>
                    </li>

                    <li class="date">
                        December 09th, 2014 at 11:05 am
                    </li>
                </ul>

                <div class="comment-body">
                    <p>
                        Lorem ipsum dolor sit amet, onsectetuer
                        dipiscing elit, sed diam nonummy nibh
                        euismod tincidunt ut laoreet dolore
                        magna aliquam erat volutpat.
                    </p>

                    <a class="comment-reply-link">
                        Reply
                    </a>
                </div>
            </div>


            <ul class="children">
                <li>
                    <div class="comment">
                        <div class="avatar">
                            <img src="img/blog/avatar02.png" alt="author" />
                        </div>

                        <ul class="comment-meta">
                            <li>
                                <a href="#" class="author">Pixel Industry</a>
                            </li>

                            <li class="date">
                                December 06th, 2014 at 10:01 am
                            </li>
                        </ul>

                        <div class="comment-body">
                            <p>
                                Lorem ipsum dolor sit amet,
                                consectetuer adipiscing elit,
                                sed diam nonummy nibh
                                euismod tincidunt ut laoreet
                                dolore magna aliquam erat
                                volutpat.
                            </p>

                            <a class="comment-reply-link">
                                Reply
                            </a>
                        </div>
                    </div>


                    <ul class="children">
                        <li>
                            <div class="comment">
                                <div class="avatar">
                                    <img src="img/blog/avatar01.png" alt="author" />
                                </div>

                                <ul class="comment-meta">
                                    <li>
                                        <a href="#" class="author">Anonymus</a>
                                    </li>

                                    <li class="date">
                                        November 29th, 2014 at 08:16 pm
                                    </li>
                                </ul>

                                <div class="comment-body">
                                    <p>
                                        Lorem ipsum dolor sit amet,
                                        consectetuer adipiscing elit,
                                        sed diam nonummy nibh
                                        euismod tincidunt ut laoreet
                                        dolore magna aliquam erat
                                        volutpat.
                                    </p>

                                    <a class="comment-reply-link">
                                        Reply
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li>
            <div class="comment">
                <div class="avatar">
                    <img src="img/blog/avatar02.png" alt="author" />
                </div>

                <ul class="comment-meta">
                    <li>
                        <a href="#" class="author">Mila Curtis</a>
                    </li>

                    <li class="date">
                        November 15th, 2013 at 02:56 pm
                    </li>
                </ul>

                <div class="comment-body">
                    <p>
                        Lorem ipsum dolor sit amet, onsectetuer
                        dipiscing elit, sed diam nonummy nibh
                        euismod tincidunt ut laoreet dolore
                        magna aliquam erat volutpat.
                    </p>

                    <a class="comment-reply-link">
                        Reply
                    </a>
                </div>
            </div>
        </li>
    </ul>
</div>
@endif

<div class="comment-form">
    <div id="respond">

        <div class="custom-heading">
            <h3>leave a comment</h3>
        </div>

        @php(comment_form())

        <form id="commentform">
            <fieldset>
                <label>
                    <span class="required">*</span> Full Name:
                </label>

                <input name="author" class="wpcf7-text" id="comment-name" type="text">
            </fieldset>

            <fieldset>
                <label>
                    <span class="required">*</span> Email address:
                </label>

                <input name="email" class="wpcf7-text" id="comment-email" type="email">
            </fieldset>

            <fieldset class="wpcf7-message">
                <label>
                    <span class="required">*</span> Message:
                </label>

                <textarea name="comment" class="wpcf7-textarea" id="comment-message" rows="8"></textarea>
            </fieldset>

            <input type="submit" class="comment-reply" value="Submit" />
        </form>
    </div>
</div>