@extends('layouts.app')
@section('content')

    <div class="container">
        <poll slug="{{ setting('site.polls_slug') }}"></poll>
    </div>

@push('scripts')
    <script src="js/app.js"></script>
@endpush

@endsection
