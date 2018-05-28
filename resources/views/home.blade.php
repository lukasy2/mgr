@extends('layouts.app')

@section('content')
<div class="container">

<?php $displaypoll = setting('site.display_poll') ?>
			@if( $displaypoll==1)
			    <div class="alert alert-primary alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Szanowni Państwo</strong> prosimy o wypełnienie ankiety dotyczącej funkcjonowania serwisu.
					<a href="{{ route('poll') }}" class="alert-link">Przejdź do ankiety</a>.
				</div>
			@endif


                        <ul class="list-unstyled">
			

                        @foreach($posts as $post)
                                <li><h1 class="mt-5"><a href="{{ route('home.post', $post) }}">{{ $post->title }}</a></h1></li>
                                <li>{!! $post->body !!}</li>
                                <li><p class="post-meta">{{ $post->created_at }}</p> </li>
                            <hr />
                        @endforeach

                        </ul>

            </div>
        {{ $posts->links("pagination::bootstrap-4") }}


@endsection
