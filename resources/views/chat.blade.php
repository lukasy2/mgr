@extends('layouts.app')
@section('content')


    <div class="container">

        <div class="row align-items-center justify-content-center">

            <div class="col-md-8 col-md-offset-2 text-md-left">

                <div class="panel panel-default">

                    <div class="panel-heading">Chat</div>

                    <div class="panel-body">
                        <chat-messages :messages="messages"></chat-messages>
                    </div>
                    <div class="panel-footer">
                        <chat-form
                                v-on:messagesent="addMessage"
                                :user="{{ Auth::user() }}"
                        ></chat-form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
    <script src="js/app.js"></script>
    @endpush


@endsection
