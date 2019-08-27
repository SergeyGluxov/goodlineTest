<div class="form-group purple-border">
    @if($show_paste != null)
    <label for="body-paste">{{$show_paste->title}}</label>
    <textarea disabled class="form-control" id="body-paste" rows="15">{{$show_paste->body}}</textarea>
    @endif
</div>