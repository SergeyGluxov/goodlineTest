@extends('layouts.app')
@section('content')
    <div class="container">
        @if(count($user_auth_paste)!=null)
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
                @foreach($user_auth_paste as $paste)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td><a href="{{$paste->slug()}}">{{$paste->title}}</a></td>
                        <td>{{$paste->lang}}</td>
                        <td>{{$paste->hide_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                Паст не найдено!
        @endif
    </div>
@endsection