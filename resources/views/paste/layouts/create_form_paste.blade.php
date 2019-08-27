<div class="container">
    <div class="form-group purple-border">
        <label for="body-paste">Новая паста</label>
        <textarea class="form-control" id="body-paste" rows="15"></textarea>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h6 class="card-header">Настройки пасты:</h6>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="title">Название:</label>
                            <input type="text" class="form-control" id="title" placeholder="" value="" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exposure">Видимость:</label>
                            <select @change.capture="onChange($event)" class="custom-select" name="exposure"
                                    id="exposure"
                                    required="">
                                <!--                                    <option v-for="part in part_checkup"></option>-->
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="expiration">Сколько хранить:</label>
                            <select @change.capture="onChange($event)" class="custom-select" name="expiration"
                                    id="expiration"
                                    required=""><!--
                                    <option v-for="part in part_checkup"></option>-->
                            </select>
                        </div>
                        <div class="col-md-5 align-self-center">
                            <button class="btn btn-primary btn-lg btn-block">
                                Создать
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>