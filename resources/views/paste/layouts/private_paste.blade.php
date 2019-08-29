<div class="container">
    <label for="card">Ваши пасты:</label>
    @if(count($user_auth_paste)==null)
        <span class=" float-right">Пусто</span>
    @endif

    <div class="card" id="card" style="width: 15rem;">
        <ul class="list-group list-group-flush">
            @foreach($user_auth_paste as $paste)
                <li class="list-group-item"><a href="{{$paste->slug()}}">{{$paste->title}}</a>
                    @if($paste->visibility==0)
                        <span class="badge badge-secondary float-right">public</span>
                    @else
                        <span class="badge badge-danger float-right">private</span>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>