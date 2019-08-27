<div class="container">
    <label for="card">Последние пасты:</label>
    <div class="card" id="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            @foreach($all_paste as $paste)
                <li class="list-group-item"><a href="{{$paste->id}}">{{$paste->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>