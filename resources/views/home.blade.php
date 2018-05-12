@extends('layouts.app')

@section('content')
<div class="container">




                        <ul class="list-unstyled">
			<?php $displaypoll = setting('site.display_poll') ?>
			@if( $displaypoll==1)
			   <poll slug="{{ setting('site.polls_slug') }}"></poll>
			@endif
                        @foreach($posts as $post)
                                <li><h1 class="mt-5"><a href="{{ route('home.post', $post) }}">{!! $post->title !!}</a></h1></li>
                                <li>{!! $post->body !!}</li>
                                <li><p class="post-meta">{{ $post->created_at }}</p> </li>
                            <hr />
                        @endforeach

                        </ul>

            </div>
        {{ $posts->links("pagination::bootstrap-4") }}
@if( $displaypoll==1)
@push('scripts')
<script src="js/app.js"></script>
@endpush
@endif

@endsection
