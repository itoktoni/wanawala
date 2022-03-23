<ul class="team-list">
    @foreach($team_list as $list_team)
    <li class="flex-1">
        <img src="{{ $list_team->team_photo ?? '' }}" alt="{{ $list_team->team_name ?? '' }}">
        <h3 class="team-name">{{ $list_team->team_name ?? '' }}</h3>
        <h5>{{ $list_team->team_jabatan ?? '' }}</h5>
        <p>{{ $list_team->team_description ?? '' }}</p>
    </li>
    @endforeach
</ul>