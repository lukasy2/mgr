@extends('layouts.app')

@section('content')


    <div class="container">

        {!! Form::open(['route' => 'AnnController.store']) !!}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="form-group">
            {!! Form::label('title', trans('site.title').":") !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('short_description', trans('site.short_description').":") !!}
            {!! Form::text('short_description', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', trans('site.body').":") !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit(trans('site.create'), ['class'=>'btn btn-primary']) !!}
            {!! link_to(URL::previous(), trans('site.back'), ['class' => 'btn btn-default']) !!}
        </div>

        {!! Form::close() !!}

    </div>

    @push('tinymce')
    @include('tinymce_init')
    @endpush

@endsection