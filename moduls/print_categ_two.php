<?php
for ($i=0; $i<count($up_cat_arr); $i++) 
{
  $level=0;
$parrent_ok = 0;
$name = $up_cat_arr[$i]['name'];
$id   = $up_cat_arr[$i]['id'];
$parrent_id = $up_cat_arr[$i]['parrent_id'];
// Ищем, есть ли подкатегории
$ParCat = FindParrentCategory($up_cat_arr, $id); // получаем массив подкатегорий
// echo "<pre>";
// var_dump($ParCat);
// echo "<pre>";
// Выводим категории без подкатегорий
if (($up_cat_arr[$i]['parrent_id'] == 0) and ($ParCat == 0)) {

echo <<<HTML
              <li><a class="dropdown-item" href="#">$name</a></li>
HTML;
}
// выводим категории с подкатегориями
    if (($up_cat_arr[$i]['parrent_id'] == 0) and ($ParCat != 0)) {
      echo <<<HTML
      <li class="dropdown">
      <a href="#">$name &#9658</a>
      <ul class="dropdown-menu dropdownhover-right">
    HTML;

    printSimpleMenu ($ParCat);

echo "</ul>";
  }

}


// функиция вывод строку категории без вложенного меню
function printSimpleMenu_1 ($ParCat) {
  echo "33333333333".$ParCat[0]['name'];
    $name1 = $ParCat[0]['name'];
    echo <<<HTML
                  <li><a class="dropdown-item" href="#">$name1</a></li>
    HTML;
     
}

// функиция вывод строку категории без вложенного меню
function printSimpleMenu ($ParCat) {
  for ($i1=0; $i1<count($ParCat); $i1++)  {
    $name1 = $ParCat[$i1]['name'];
    echo <<<HTML
                  <li><a class="dropdown-item" href="#">$name1</a></li>
    HTML;
    } 
}

// функция выбрает массив подкатегорий или возвращает 0, если нет подкатегория
function FindParrentCategory($arr, $id){
  $k=0;
  for ($i=0; $i<count($arr); $i++) {
     if ($arr[$i]['parrent_id'] == $id) {
       $sub_arr[$k] = $arr[$i];
       $sub_arr[$k]['isk'] = $i;
       $k++;
     }
  }
  if (!empty($sub_arr)) {
    return $sub_arr;
  } else {
    return 0;
  }
}


?>