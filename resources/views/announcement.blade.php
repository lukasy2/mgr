@extends('layouts.app')

@section('content')

    <div class="container">
            <h1 class="mt-5">{{ $announcement->title }}</h1>
            {!! $announcement->body !!}
            <br />
            <em>{{ $announcement->created_at }}</em>
            <br />
            {{ $announcement->postedBy['name'] }}
        <p><a href="{{ route('AnnController.reply', $announcement) }}"><button type="button" class="btn btn-primary">{{ trans('site.reply') }}</button></a></p>

        <hr />

    </div>



@endsection