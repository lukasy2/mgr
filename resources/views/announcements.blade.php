@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($announcements as $announcement)
            <h1 class="mt-5"><a href="{{ route('AnnController.ann', $announcement) }}">{{ $announcement->title }}</a></h1>
            {{ $announcement->short_description }}
        <br />

            <em>{{ $announcement->created_at }}</em>
        <br />
            {{ $announcement->postedBy['name'] }}
            <hr />
        @endforeach
            {{ $announcements->links("pagination::bootstrap-4") }}

    </div>



@endsection