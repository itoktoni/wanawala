<h2 class="widget-title">Tag Terpopular</h2>

<ul class="cloud">
    @if(!empty($tags))
    @foreach($tags as $tag)
    <li class="cloud-list"><a class="cloud-tag" href="{{ url('tag/'.$tag->slug ?? '') }}">{{ $tag->name ?? '' }}</a></li>
    @endforeach
    @endif
</ul>