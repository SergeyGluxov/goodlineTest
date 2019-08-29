@extends('layouts.app')
@section('content')
    <div class="container">
        @if(count($paste_paginate)!=null)
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название пасты</th>
                    <th scope="col">Язык</th>
                    <th scope="col">Доступна до</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paste_paginate as $paste)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td><a href="{{$paste->slug()}}">{{$paste->title}}</a></td>
                        <td>{{$paste->lang}}</td>
                        <td>{{$paste->hide_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$paste_paginate->links()}}
            @else
                Паст не найдено!
        @endif
    </div>
@endsection