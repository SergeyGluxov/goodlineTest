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
                                    <option value="1">Только по ссылке</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="_lang">Язык:</label>
                                <select class="custom-select" name="_lang"
                                        id="_lang">
                                    <option></option>
                                    <option value="html">HTML</option>
                                    <option value="js">JS</option>
                                    <option value="php">PHP</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="time-live">Сколько хранить:</label>
                                <select  class="custom-select" name="time-live" id="time-live" required="">
                                    <option value="0">10 мин</option>
                                    <option value="1">1 час</option>
                                    <option value="2">3 часа</option>
                                    <option value="3">1 день</option>
                                    <option value="4">1 неделя</option>
                                    <option value="5">1 месяц</option>
                                    <option value="6" selected>без ограничения</option>
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