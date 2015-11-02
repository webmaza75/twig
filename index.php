<?php

require __DIR__ . '/vendor/autoload.php';
Twig_Autoloader::register();
require __DIR__ . '/src/Item.php';

$loader = new Twig_Loader_Filesystem([
    __DIR__ . '/layouts', // основные шаблоны
    __DIR__ . '/templates', // наследуемые шаблоны
]);

$twig = new Twig_Environment($loader, [
    'cache' => false, // кэш отключен
]);
/**
 * Массив с данными для шаблона (потом будут браться либо из БД, либо из файла .php с return[массив данных])
 */
$item = new Item(
    'Аккумуляторная дрель AEG BS 12C2 Li-302B 440446',
    'Дрель',
    '9950',
    //'http://twig.local/img/akdrel1.jpg'
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/541386/350x315/924925.jpg'
);

$item2 = new Item('Электрический шуруповёрт Калибр ЭШР-600ЕМ 00000033189',
    'Шуруповерт',
    '2620',
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/709783/350x315/1000049.jpg'
);
$item3 = new Item('Аккумуляторная дрель Калибр ДА-18/2+Н550 00000051218',
    'Дрель',
    '6920',
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/686089/350x315/966571.jpg'
);

$items = array($item, $item2, $item3); // массив товаров для вывода на экран (здесь все)
$about = "Компания реализует надежные инструменты от ведущих производителей по приемлемым ценам. Ниже - только даром. Нам доверяют, - проверено годами!";
if(isset($_GET['page'])) { // определяем, какой template c какими параметрами подгружать
    if (!empty($_GET['page']) && ($_GET['page'] == 'all')) {
        echo $twig->render('page.html', ['items' => $items]);
    } elseif (!empty($_GET['page']) && ($_GET['page'] == 'about')) {
        echo $twig->render('about.html', ['about' => $about]);
    } elseif (!empty($_GET['page'] == 'index')) {
        echo $twig->render('index.html', ['goods' => 'Товары', 'about' => 'O нас']);
    }
} else {
    echo $twig->render('index.html', ['goods' => 'Товары', 'about' => 'O нас']);
}