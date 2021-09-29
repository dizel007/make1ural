<?php
for ($i=0; $i<count($up_cat_arr); $i++) 
{
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
for ($i1=0; $i1<count($ParCat); $i1++)  {
$name1 = $ParCat[$i1]['name'];

echo <<<HTML
              <li><a class="dropdown-item" href="#">$name1</a></li>
HTML;
}

echo "</ul>";
  }

}

?>