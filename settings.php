<?php
require_once($_SERVER['DOCUMENT_ROOT']."/assets/header.php");
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1 col-md-1 sidebar">
                <?require_once($_SERVER['DOCUMENT_ROOT']."/assets/menu.php");?>
            </div>
            <div class="col-sm-9 col-md-11 main">
                <div class="row">
                    <div id="parseResult" class="col-sm-12">
                        <h2 class="text-center">Настройки</h2>
                        <form method="post" action="<?="/kernel/update.php"?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Сайты для парса</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox" checked>
                                    </span>
                                        <input type="text" class="form-control" value="Авито ( http://avito.ru )" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Категории для парса</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox" checked>
                                    </span>
                                        <input name="apps" type="text" class="form-control" value="Квартиры" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox">
                                    </span>
                                        <input type="text" class="form-control" value="Дома, дачи, коттеджи" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox">
                                    </span>
                                        <input type="text" class="form-control" value="Земельные участки" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox">
                                    </span>
                                        <input type="text" class="form-control" value="Гаражи" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox">
                                    </span>
                                        <input type="text" class="form-control" value="Коммерческая недвижимость" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox" checked>
                                    </span>
                                        <input type="text" class="form-control" value="Недвижимость за рубежом" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Вид сделки</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox" checked>
                                    </span>
                                        <input type="text" class="form-control" value="Продажа" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox" checked>
                                    </span>
                                        <input type="text" class="form-control" value="Покупка" disabled>
                                    </div>
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                      <input id="avito" type="checkbox" checked>
                                    </span>
                                        <input type="text" class="form-control" value="Аренда" disabled>
                                    </div>
                                </div>
                            </div>
                            <input id="save" type='button' class='btn btn-lg btn-success' value='Сохранить'>
                            <input id="parse" type='submit' class='btn btn-lg btn-danger' value='Спарсить базу'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/assets/footer.php");
?>