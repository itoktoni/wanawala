@extends('layouts.main')

@section('content')

@template('parts.content', 'page')

@if(!empty($template))
    @foreach($template as $theme)
        @includeIf('parts._'.$theme->acf_fc_layout, ['data' => $theme])
    @endforeach
@endif

@endsection