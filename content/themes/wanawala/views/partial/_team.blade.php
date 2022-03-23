@push('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;700&display=swap" rel="stylesheet">

<style>
    .team-name {
        font-family: 'Sansita Swashed', cursive;
        font-size: 25px !important;
    }
</style>
@endpush

@if($data->team_list)
<div class="team">
    <div class="post-header">
        @if($data->team_title)
        <h2 class="post-title">
            {{ $data->team_title ?? '' }}
        </h2>
        @endif
        @if($data->team_content)
        <p>{!! $data->team_content ?? '' !!}</p>
        @endif
    </div>
    @if(!empty($data->team_list))
    @if(count($data->team_list) > 3)
    @foreach(collect($data->team_list)->chunk(3) as $list_team)
    @includeIf('partial._small_team', ['team_list' => $list_team])
    @endforeach
    @else
    @includeIf('partial._small_team', ['team_list' => $data->team_list])
    @endif
    @endif
</div>
@endif