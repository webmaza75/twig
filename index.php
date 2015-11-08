<?php

require __DIR__ . '/vendor/autoload.php';
Twig_Autoloader::register();
require __DIR__ . '/src/Item.php';
require __DIR__ . '/src/functions.php'; // подключение вспомогательных функций
require __DIR__ . '/classes/MyExtension.php'; // подключение класса расширений

$loader = new Twig_Loader_Filesystem([
    __DIR__ . '/layouts', // основные шаблоны
    __DIR__ . '/templates', // наследуемые шаблоны
]);

$twig = new Twig_Environment($loader, [
    'cache' => false, // кэш отключен
]);
$twig->addExtension(new MyExtension());


/**
 * Массив с данными для шаблона (потом будут браться либо из БД, либо из файла .php с return[массив данных])
 */
$item = new Item('111',
    'Аккумуляторная дрель AEG BS 12C2 Li-302B 440446',
    'Аккумуляторная дрель AEG BS 12C2 Li-302B 440446 - это компактный инструмент, длиной всего 168 мм. Он имеет 16 ступеней крутящего момента, что позволяет настроиться на оптимальный режим работы. Максимальный крутящий момент составляет 34 Нм, что позволяет работать с достаточно твердыми соединениями. Данная модель поставляется с 2 аккумуляторами ProLi-lon ёмкостью 3 А*ч, зарядным устройством и сумкой.',
    'Дрель',
    '03.011.2015',
    '9950',
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/541386/350x315/924925.jpg',
    '3',
    ['tags' => ['10'=>'дрель', '20'=>'инструмент']]
);

$item2 = new Item('222',
    'Электрический шуруповёрт Калибр ЭШР-600ЕМ 00000033189',
    'Электрический шуруповёрт Калибр ЭШР-600ЕМ 00000033189 широко используется при отделочно монтажных работах, предназначен для завертывания и отвертывания шурупов, самонарезных винтов. Данная модель шуруповерта оснащена новым типом электродвигателя, с более высоким КПД, чем у предшественников, что позволяет работать при более интенсивной нагрузке. Максимальный диаметр шурупа: дерево - 8 мм, металл - 6 мм.',
    'Шуруповерт',
    '17.06.2015',
    '2620',
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/709783/350x315/1000049.jpg',
    '2',
    ['tags' => ['30'=>'шуруповерт', '20'=>'инструмент']]
);
$item3 = new Item('333',
    'Аккумуляторная дрель Калибр ДА-18/2+Н550 00000051218',
    'Аккумуляторная дрель Калибр ДА-18/2+Н550 00000051218 отлично справляется с крепежными работами, а также сверлением отверстий в дереве, металле и других материалах. Модель эксплуатируется в двух скоростных режимах в зависимости от твердости обрабатываемого материала. При своем малом весе дрель обладает достаточным показателем крутящего момента в 26 Нм и аккумуляторными батареями повышенной ёмкости.',
    'Дрель',
    '12.03.2015',
    '6920',
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/686089/350x315/966571.jpg',
    '5',
    ['tags' => ['10'=>'дрель', '20'=>'инструмент']]
);
$item4 = new Item('444',
    'Аккумуляторный шуруповерт Hitachi DS12DVF3',
    'Аккумуляторный шуруповерт Hitachi DS12DVF3 предназначен для закручивания крепежных элементов, оснащен мощным двигателем и надежным редуктором. Несколько режимов крутящего момента  - для выбора  нужного в зависимости от интенсивности работы. Быстрозажимной патрон обеспечивает простую замену насадок, что позволяет экономить  время. Наличие дополнительного аккумулятора делает  работу автономной.',
    'Шуруповерт',
    '10.08.2015',
    '4929',
    'http://www.vseinstrumenti.ru/images/goods/instrument/shurupoverty/2234/220x198/2234.jpg',
    '4',
    ['tags' => ['30'=>'шуруповерт', '20'=>'инструмент']]
);

$items = array($item, $item2, $item3, $item4); // массив товаров для вывода на экран (здесь все)
$about = "Компания реализует надежные инструменты от ведущих производителей по приемлемым ценам. Ниже - только даром. Нам доверяют, - проверено годами!";
if(isset($_GET['page'])) { // определяем, какой template c какими параметрами подгружать
    if (!empty($_GET['page']) && ($_GET['page'] == 'all')) {
        echo $twig->render('goods.html', ['items' => $items]); // Список всех товаров (страница товаров)
    } elseif(!empty($_GET['page']) && ($_GET['page'] == 'one')
        && (isset($_GET['id'])) && (!empty($_GET['id']))) {
        $id = intval($_GET['id']);
        $item = findItemById($id);
        echo $twig->render('page.html', ['item' => $item]);

    } elseif (!empty($_GET['page']) && ($_GET['page'] == 'about')) {
        echo $twig->render('about.html', ['about' => $about]);
    } elseif (!empty($_GET['page'] == 'index')) {
        echo $twig->render('index.html', ['goods' => 'Товары', 'about' => 'O нас']);
    }
} else {
    echo $twig->render('index.html', ['goods' => 'Товары', 'about' => 'O нас']);
}