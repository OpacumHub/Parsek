<?php
require_once($_SERVER['DOCUMENT_ROOT']."/assets/header.php");
require($_SERVER['DOCUMENT_ROOT'].'/kernel/Parser.php');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-1 col-md-1 sidebar">
            <?require_once($_SERVER['DOCUMENT_ROOT']."/assets/menu.php");?>
        </div>
        <div class="col-sm-9 col-md-5 col-md-offset-2 main ">
            <div class="row">
                <div class="jumbotron">
                    <h2 class="text-center">
                        <?
                        $avito = new Avito();
                        $avito->dataUpdate();
                        ?>
                    </h2>
                    <hr/>
                    <p class="text-center">
                        <a href="/settings.php" class="btn btn-primary btn-lg" role="button">Назад</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/assets/footer.php");
?>