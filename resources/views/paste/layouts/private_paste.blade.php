<div class="container">
    <label for="card">Ваши пасты:</label>
    @if($user_auth_paste!=null)
        <div class="card" id="card" style="width: 15rem;">
            <ul class="list-group list-group-flush">
                @foreach($user_auth_paste as $paste)
                    <li class="list-group-item"><a href="{{$paste->slug()}}">{{$paste->title}}</a>
                        @if($paste->visibility==0)
                            <span class="badge badge-success float-right">public</span>
                        @elseif($paste->visibility==1)
                            <span class="badge badge-secondary float-right">unlisted</span>
                            @else
                            <span class="badge badge-danger float-right">private</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <span class=" float-right">Пусто</span>
    @endif
</div>