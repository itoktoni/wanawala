@extends('layouts.main')

@section('content')
    @loop
        @template('parts.content', get_post_type())
    @endloop
@endsection