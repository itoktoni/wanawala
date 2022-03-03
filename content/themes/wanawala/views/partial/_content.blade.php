@if($data->content_description)
<div class="team">
    <div class="post-header">
        <h2 class="post-title">
            {{ $data->content_title ?? '' }}
        </h2>
        <p>{!! $data->content_description ?? '' !!}</p>
    </div>
</div>
@endif