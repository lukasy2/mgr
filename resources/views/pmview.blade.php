@extends('layouts.app')

@section('content')

    <div class="container">

        @if($message->to_id==Auth::user()->id and $message->deleted_by_receiver=='0')
            <h1 class="mt-5">{{ $message->title }}</h1>
            {!! $message->body !!}
            <br />
            <em>{{ $message->created_at }}</em>
            <br />
            {{ trans('site.from').":" }}{{ $message->from->name }}
            <p><a href="{{ route('PMController.delete', $message) }}"><button type="button" class="btn btn-danger">{{ trans('site.delete') }}</button></a>
                <a href="{{ route('PMController.reply', $message) }}"><button type="button" class="btn btn-primary">{{ trans('site.reply') }}</button></a></p>
        @elseif($message->from_id==Auth::user()->id and $message->deleted_by_sender=='0')
            <h1 class="mt-5">{{ $message->title }}</h1>
            {!! $message->body !!}
            <br />
            <em>{{ $message->created_at }}</em>
            <br />
            {{ trans('site.to').":" }}{{ $message->to->name }}
            <p><a href="{{ route('PMController.delete', $message) }}"><button type="button" class="btn btn-danger">{{ trans('site.delete') }}</button></a></p>
        @else
            {{ trans('site.no_messages') }}
        @endif
            <hr />

    </div>



@endsection