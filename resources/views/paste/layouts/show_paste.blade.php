<div class="form-group purple-border">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/styles/color-brewer.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.10/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    @if($show_paste != null)
        <label for="body-paste">Название пасты: {{$show_paste->title}}</label>
        <pre>
            <code lang="language-html">
                    {{$show_paste->body}}
            </code>
        </pre>
        <label for="title">Ссылка на вашу пасту:</label>
        <input type="text" class="form-control w-50" name="title" placeholder="" disabled value="{{request()->url()}}"
               required="">
    @endif
</div>