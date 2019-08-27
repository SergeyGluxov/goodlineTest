@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @include('paste.layouts.create_form_paste')
            </div>
            <div class="col-md-2">
                @include('paste.layouts.lastpaste')
                <br>
                @auth
                    @include('paste.layouts.private_paste')
                @endauth
            </div>
        </div>
    </div>
@endsection
