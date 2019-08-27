<div class="container">
    <label for="card">Последние публичные пасты:</label>
    <div class="card" id="card" style="width: 15rem;">
        <ul class="list-group list-group-flush">
            @foreach($public_paste as $paste)
                <li class="list-group-item"><a href="{{$paste->id}}">{{$paste->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>