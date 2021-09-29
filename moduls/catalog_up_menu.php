
<?php

//Устанавливаем кодировку и вывод всех ошибок
header('Content-Type: text/html; charset=UTF-8');
error_reporting(E_ALL);

//Объектно-ориентированный стиль
//Устанавливаем кодировку utf8
$mysqli->query("SET NAMES 'utf8'");

/*
 * Это "официальный" объектно-ориентированный способ сделать это
 * однако $connect_error не работал вплоть до версий PHP 5.2.9 и 5.3.0.
 */
if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

/*
 * Если нужно быть уверенным в совместимости с версиями до 5.2.9,
 * лучше использовать такой код
 */
if (mysqli_connect_error()) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

//Получаем массив нашего меню из БД в виде массива
function getCat($mysqli){
    $sql = 'SELECT * FROM `catalog`';
    $res = $mysqli->query($sql);

    //Создаем масив где ключ массива является ID меню
    $cat = array();
    while($row = $res->fetch_assoc()){
        $cat[$row['id']] = $row;
    }
    return $cat;
}

//Функция построения дерева из массива от Tommy Lacroix
function getTree($dataset) {
    $tree = array();

    foreach ($dataset as $id => &$node) {    
        //Если нет вложений
        if (!$node['parent']){
            $tree[$id] = &$node;
        }else{ 
            //Если есть потомки то перебераем массив
            $dataset[$node['parent']]['childs'][$id] = &$node;
        }
    }
    return $tree;
}

//Получаем подготовленный массив с данными
$cat  = getCat($mysqli); 

//Создаем древовидное меню
$tree = getTree($cat);

//Шаблон для вывода меню в виде дерева
function tplMenu($category){
    $menu = '<li class="nav-item dropdown">
        <a class="dropdown-item" href="'.$category['link'].'" title="'. $category['title'] .'">'. 
        $category['title'].'</a>';
        
        if(isset($category['childs'])){
            $menu .= '<ul class="dropdown-menu">'. showCat($category['childs']) .'</ul>';
        }
    $menu .= '</li>';
    
    return $menu;
}

/**
* Рекурсивно считываем наш шаблон
**/
function showCat($data){
    $string = '';
    foreach($data as $item){
        $string .= tplMenu($item);
    }
    return $string;
}

//Получаем HTML разметку
$cat_menu = showCat($tree);

//Выводим на экран
echo '<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">'. $cat_menu .'</ul>';

?>