<div class="form-group purple-border">
    @if($show_paste != null)
        <label for="body-paste">Название пасты: {{$show_paste->title}} </label>
        <span href="#" class="float-right badge badge-success">{{$show_paste->lang}}</span>
        <pre>
            <code lang="{{$show_paste->lang}}">
                    {{$show_paste->body}}
            </code>
        </pre>
        <label for="title">Ссылка на вашу пасту:</label>
        <input type="text" class="form-control w-50" name="title" placeholder="" disabled value="{{request()->url()}}"
               required="">
    @endif
</div>