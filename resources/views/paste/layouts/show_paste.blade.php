<div class="form-group purple-border">
    @if($show_paste != null)
        <label for="body-paste">Название пасты: {{$show_paste->title}}</label>
        <textarea disabled class="form-control" id="body-paste" rows="15">{{$show_paste->body}}</textarea><br>
        <label for="title">Ссылка на вашу пасту:</label>
        <input type="text" class="form-control w-50" name="title" placeholder="" disabled value="{{request()->url()}}"
               required="">
    @endif
</div>