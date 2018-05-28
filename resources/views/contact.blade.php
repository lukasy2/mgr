@extends('layouts.app')

@section('content')
    <div class="container">
        @auth
        <h1 class="mt-5">Kontakt</h1>
        <hr />
        W razie jakichkolwiek problemów z funkcjonowaniem serwisu lub sugestii/uwag prosimy o kontakt
        poprzez poniższy formularz lub o wysłanie wiadomości <a href="mailto:lukasy2@gmail.com">e-mail</a>.
        {!! Form::open(['route' => 'PMController.store']) !!}

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="btn btn-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="form-group">
            {{ Form::hidden('email', 'admin@admin.com') }}

        </div>

        <div class="form-group">
            {{ Form::label('title', trans('site.title').":") }}
            {{ Form::text('title', null, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::label('body', trans('site.body').":") }}
            {{ Form::textarea('body', null, ['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit(trans('site.send'), ['class'=>'btn btn-primary']) }}
            {{ link_to(URL::previous(), trans('site.back'), ['class' => 'btn btn-default']) }}
        </div>

        {!! Form::close() !!}
        @endauth

        @guest
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Uwaga!</strong> tylko zalogowani użytkownicy mają dostęp do tej części serwisu.
            <a href="{{ route('login') }}" class="alert-link">Zaloguj się</a> lub
            <a href="{{ route('register') }}" class="alert-link">zarejestruj</a> jeśli nie posiadasz jeszcze konta.
        </div>
        @endguest
    </div>

    @push('tinymce')
    @include('tinymce_init')
    @endpush
@endsection