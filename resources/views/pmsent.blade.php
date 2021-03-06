@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-5">{{ trans('site.sent').":" }}</h1>
    @if($sent->isEmpty())
            <h1 class="mt-5">{{ trans('site.no_messages') }}</h1>
        @else
            @foreach($sent as $message)
                @if($message->from_id==Auth::user()->id)
                    <hr />
                    <h2 class="mt-5"><a href="{{ route('PMController.view', $message) }}">{{  $message->title }}</a></h2>
                    <p>{{ trans('site.to').":" }}{{  $message->to->name }}</p>
                    {{ trans('site.body').":" }} {!!  $message->body !!}
                    <p><a href="{{ route('PMController.delete', $message) }}"><button type="button" class="btn btn-danger">{{ trans('site.delete') }}</button></a></p>
                    <hr />
                @endif
            @endforeach
        @endif
    </div>


@endsection