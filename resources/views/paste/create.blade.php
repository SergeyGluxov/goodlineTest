@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="mb-4">
                    @include('paste.layouts.search_paste')
                </div>
                @include('paste.layouts.create_form_paste')
            </div>
            <div class="col-md-2">
                <div class="mb-4">
                    @include('paste.layouts.lastpaste')
                </div>
                @auth
                    @include('paste.layouts.private_paste')
                @endauth
            </div>
        </div>
    </div>
@endsection
