<div class="container">
    <form action="{{route('store_paste')}}" method="POST">
        @csrf
        <div class="form-group purple-border">
            <label for="body-paste">Новая паста</label>
            <textarea class="form-control" type="input" name="body" rows="15" required=""></textarea>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h6 class="card-header">Настройки пасты:</h6>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title">Название:</label>
                                <input type="text" class="form-control" name="title" placeholder="" value=""
                                       required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="exposure">Видимость:</label>
                                <select class="custom-select" name="visibility"
                                        id="exposure"
                                        required="">
                                    <option value="0">Публичная</option>
                                    <option value="1">Частная</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="expiration">Сколько хранить:</label>
                                <select @change.capture="onChange($event)" class="custom-select" name="expiration"
                                        id="expiration"
                                        required="">
                                    <option>1 месяц</option>
                                    <option>1 год</option>
                                    <option>Всегда</option>
                                </select>
                            </div>
                            <div class="col-md-5 float-left">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Создать
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>