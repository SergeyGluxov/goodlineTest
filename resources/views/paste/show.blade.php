@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @include('paste.layouts.show_paste')
            </div>
            <div class="col-md-2">
                @include('paste.layouts.lastpaste')<br>
                @include('paste.layouts.private_paste')
            </div>
        </div>
    </div>
@endsection
