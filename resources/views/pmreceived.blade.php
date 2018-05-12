@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-5">{{ trans('site.received').":" }}</h1>
    @if($received->isEmpty())
            <h1 class="mt-5">{{ trans('site.no_messages') }}</h1>
        @else
            @foreach($received as $message)
                @if($message->to_id==Auth::user()->id)
                    <hr />
                    <h2 class="mt-5"><a href="{{ route('PMController.view', $message) }}">{{  $message->title }}</a></h2>
                    <p>{{ trans('site.from').":" }}{{  $message->from->name }}</p>
                    {{ trans('site.body').":" }} {!!  $message->body !!}
                    <p><a href="{{ route('PMController.delete', $message) }}"><button type="button" class="btn btn-danger">{{ trans('site.delete') }}</button></a>
                    <a href="{{ route('PMController.reply', $message) }}"><button type="button" class="btn btn-primary">{{ trans('site.reply') }}</button></a></p>
                    <hr />
                @endif
            @endforeach
        @endif
    </div>


@endsection