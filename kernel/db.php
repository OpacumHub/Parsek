<?php
require_once($_SERVER['DOCUMENT_ROOT']."/configs/dbconf.php"); //Получаем настройки

class DB {
    //Для добавления записей
    function insert($table, $ads){
        global $dbconf;
        $dba = mysqli_connect($dbconf['host'],$dbconf['user'],$dbconf['password'], $dbconf['database']);
        if (!$dba) {
            echo('Не удалось соединиться: ' . mysqli_connect_error());
            exit();
        }
        mysqli_query($dba, "SET NAMES ".$dbconf['charset']);

        foreach($ads as $item)
        {
            $siteID = $item['id'];
            $real_estate = $item['real_estate'];
            $type = $item['type'];
            $title = $item['title'];
            $desc = $item['desc'];
            $square = $item['square'];
            $seller = $item['seller'];
            $tel = $item['tel'];
            $price = $item['price'];
            $date = $item['date'];
            $link = $item['link'];

            $sql = "REPLACE INTO $table (SITE, ID_SITE, REAL_ESTATE, TYPE, TITLE, DESCRIPTION, SQUARE, SELLER, TEL, PRICE, DATE, LINK) VALUES (
            'Авито',
            '$siteID',
            '$real_estate',
            '$type',
            '$title',
            '$desc',
            '$square',
            '$seller',
            '$tel',
            '$price',
            '$date',
            '$link'
            )";
            mysqli_query($dba, $sql) or die ('Не удалось записать данные: ' . mysqli_error($dba));

        }
    }
    //Для получения записей
    function getTable($table) {
        global $dbconf;
        $dba = mysqli_connect($dbconf['host'],$dbconf['user'],$dbconf['password'], $dbconf['database']);
        if (!$dba) {
            echo('Не удалось соединиться: ' . mysqli_connect_error());
            exit();
        }
        mysqli_query($dba, "SET NAMES ".$dbconf['charset']);

        $sql = "SELECT REAL_ESTATE, TYPE, TITLE, DESCRIPTION, SQUARE, SELLER, TEL, PRICE, DATE, LINK FROM $table";
        if ($result = mysqli_query($dba, $sql))
        {
            global $viewTable;
            while ($row = mysqli_fetch_row($result))
            {
                $viewTable[]=$row;
            }
            mysqli_free_result($result);
        }

        mysqli_close($dba);
    }
}