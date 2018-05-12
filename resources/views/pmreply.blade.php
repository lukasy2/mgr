@extends('layouts.app')

@section('content')

    <div class="container">

        {!! Form::open(['route' => 'PMController.store']) !!}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="form-group">
            {!! Form::label('email', trans('site.to_email').":") !!}
            {!! Form::text('email', $replyto->first()->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('title', trans('site.title').":") !!}
            {!! Form::text('title', 'RE: '.$message->title, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', trans('site.body').":") !!}
            {!! Form::textarea('body', $message->created_at.", ".trans('site.user').": ".$replyto->first()->name." ".trans('site.wrote').": ".$message->body, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(trans('site.send'), ['class'=>'btn btn-primary']) !!}
            {!! link_to(URL::previous(), trans('site.back'), ['class' => 'btn btn-default']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    @push('tinymce')
    @include('tinymce_init')
    @endpush

@endsection