<div class="container">
    <label for="card">Последние публичные пасты:</label>
    <div class="card" id="card" style="width: 15rem;">
        <ul class="list-group list-group-flush">
            @foreach($share_paste as $paste)
                <li class="list-group-item">
                    <a href="{{$paste->slug()}}">
                        {{$paste->title}}
                    </a>
                    <span href="#" class="float-right badge badge-light">{{$paste->create_at}}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>