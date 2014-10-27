<?php
require_once($_SERVER['DOCUMENT_ROOT']."/kernel/simple_html_dom.php"); //Подключаем библиотеку Simple HTML DOM
require_once($_SERVER['DOCUMENT_ROOT']."/configs/config.php"); //Получаем настройки
require_once($_SERVER['DOCUMENT_ROOT']."/kernel/db.php"); //Подключаем классы для работы с MySQL

class Avito {
    protected  $root_link = 'http://www.avito.ru/';

    function dataUpdate()
    {
        //Ставим счетчик на время выполнения
        $time_start = microtime(1);
        global $avitoResult;
        global $setting;
        $city = 'serpuhov';
        foreach ($setting['category'] as $param) //Приводим настройки категорий к виду, как на авито
        {
            if ($param == 'apartments')
                $category[] = 'kvartiry';
            else if ($param == 'gringo')
                $category[] = 'nedvizhimost_za_rubezhom';
        }
        foreach ($setting['type'] as $param) //Приводим настройки типа сделок к виду, как на авито
        {
            if ($param == 'buy')
                $type[] = 'kuplyu';
            else if ($param == 'sell')
                $type[] = 'prodam';
            else if ($param == 'rent')
                $type[] = 'sdam';
        }
        foreach ($category as $cat) //Перебираем категории
        {
            foreach ($type as $item) //Перебираем типы сделок
            {
                $i = 0;
                if (@fopen($this->getRoot().$city.'/'.$cat.'/'.$item,'r')) //Проверяем, существует ли ссылка
                {
                    $html = new simple_html_dom($this->getRoot().$city.'/'.$cat.'/'.$item);
                    foreach ($html->find('div.j-catalog-item-enum') as $block) //Перебираем объявления
                    {
                        $detailPageURL = $block->find("div.description h3.title a",0)->getAttribute('href');
                        $ads['id'] = $block->getAttribute('id');
                        $ads['real_estate'] = $this->getDetailParam('real_estate',$detailPageURL);
                        $ads['type'] = 'TODO';

                        $ads['title'] = $block->find("div.description h3.title a",0)->innertext;


                        $ads['desc'] = $this->getDetailParam('detail_text',$detailPageURL);

                        $ads['square'] = 'TODO';

                        if (strlen($block->find("div.data p",0)->innertext)>4)
                        {
                            $ads['seller'] = $block->find("div.data p",0)->innertext;
                        }
                        else
                        {
                            $ads['seller'] = 'Продавец не указан';
                        }

                        $ads['tel'] = 'TODO';

                        //Косяк simple_html_dom выводит 4 символа вместо пустого значения
                        if (strlen($block->find("div.about",0)->innertext)>4)
                        {
                            $ads['price'] = $block->find("div.about",0)->plaintext;
                        }
                        else
                        {
                            $ads['price'] = 'Цена не указана';
                        }

                        $ads['date'] = $block->find("div.data div.date",0)->innertext;

                        $ads['link'] = 'TODO';

                        $avitoResult[] = $ads;
                        $i++;

                        //Выбираем 5-ть объявлений из раздела и идем в следующий
                        if ($i == 5) break;

                        //Ждем 10 секунд, чтоб не забанили
                        sleep(10);
                    }
                }
                else
                {
                    continue;
                }
            }
        }

        //Отдаем массив объявлений в базу
        DB::insert('main',$avitoResult);

        //Считаем время на выполнение
        $time_end = microtime(1);
        $time = intval($time_end - $time_start);

        echo('Базы обновлены ');
        echo('<small>База обновились за '.$time.' cекунд</small>');

    }

    function getRoot()
    {
        return $this->root_link;
    }

    function getDetailParam($param,$detailName){
        $html = new simple_html_dom($this->getRoot().$detailName);
        if ($param == 'real_estate')
        {
            $realEstate = $html->find('h1[itemprop=name]',0)->innertext;
            $realEstate = preg_replace('/,(.+)/u','',$realEstate);
            return $realEstate;
        }
        else if ($param == 'detail_text')
        {
            $desc = $html->find('div.description-text',0)->innertext;
            return $desc;
        }

    }
}



?>