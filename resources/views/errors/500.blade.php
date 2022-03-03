@extends('layouts.main')

@section('content')
@if(have_posts())

<div class="">
    <div class="container">

        <div class="row content">
            <ul class="col-md-12 blog-posts post-list">

                @while(have_posts())
                @php(the_post())
                @template('parts.content', 'search')
                <hr>
                @endwhile

                {!! get_the_posts_navigation() !!}

            </ul>
        </div>
    </div>
</div>

@else
@template('parts.content', 'none')
@endif
@endsection