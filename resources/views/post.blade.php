@extends('layouts.app')

@section('content')
    <ul class="list-unstyled">
            <li><h1 class="mt-5">{{ $post->title }}</h1></li>
            <img src="{{ Voyager::image( $post->image ) }}" style width="50%">
            <li>{!! $post->body !!}</li>
            <li><p class="post-meta">{{ $post->created_at }}</p> </li>
            <hr />
    </ul>
    @endsection