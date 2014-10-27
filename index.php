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
                    <h1 class="text-center">База</h1>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Недвижимость</th>
                                <th class="text-center">Тип</th>
                                <th class="text-center">Заголовок</th>
                                <th class="text-center">Описание</th>
                                <th class="text-center">Площадь</th>
                                <th class="text-center">Продавец</th>
                                <th class="text-center">Телефон</th>
                                <th class="text-center">Цена</th>
                                <th class="text-center">Дата</th>
                                <th class="text-center">Ссылка на объявление</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="10">
                                    <h2 class="text-center">Авито</h2>
                                </td>
                            </tr>
                            <?
                            include('kernel/Parser.php');
                            global $viewTable;
                            DB::getTable('main'); //Получаем таблицу
                            foreach($viewTable as $ads)
                            { ?>
                                <tr>
                                    <td>
                                        <?=$ads[0]?>
                                    </td>
                                    <td>
                                        <?=$ads[1]?>
                                    </td>
                                    <td>
                                        <?=$ads[2]?>
                                    </td>
                                    <td>
                                        <?=$ads[3]?>
                                    </td>
                                    <td>
                                        <?=$ads[4]?>
                                    </td>
                                    <td>
                                        <?=$ads[5]?>
                                    </td>
                                    <td>
                                        <?=$ads[6]?>
                                    </td>
                                    <td>
                                        <?=$ads[7]?>
                                    </td>
                                    <td>
                                        <?=$ads[8]?>
                                    </td>
                                    <td>
                                        <?=$ads[9]?>
                                    </td>
                                </tr>
                            <?
                            } //end foreach
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/assets/footer.php");
?>