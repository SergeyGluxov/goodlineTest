<div class="container">
    <form action="{{route('search')}}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search_paste" class="form-control" placeholder="Введите название пасты для поиска"
                   aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-success">Найти</button>
            </div>
        </div>
    </form>
</div>
