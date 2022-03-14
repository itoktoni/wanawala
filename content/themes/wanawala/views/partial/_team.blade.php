@push('style')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@300;700&display=swap" rel="stylesheet">

<style>
    .team-name{
        font-family: 'Sansita Swashed', cursive;
        font-size: 25px !important;
    }
</style>
@endpush

@if($data->team_title)
<div class="team">
    <div class="post-header">
        <h2 class="post-title">
            {{ $data->team_title ?? '' }}
        </h2>
        <p>{!! $data->team_content ?? '' !!}</p>
    </div>
    @if(!empty($data->team_list))
    <ul class="team-list">
        @foreach($data->team_list as $list_team)
        <li class="flex-1">
            <img src="{{ $list_team->team_photo ?? '' }}" alt="{{ $list_team->team_name ?? '' }}">
            <h3 class="team-name">{{ $list_team->team_name ?? '' }}</h3>
            <h5>{{ $list_team->team_jabatan ?? '' }}</h5>
            <p>{{ $list_team->team_description ?? '' }}</p>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endif