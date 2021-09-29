<?php
class FirstMenu {
  public $array;

  public function RealFirst () {
    
  }
}


$sql = "SELECT * FROM `catalog` WHERE `close` = false "; 
$query = $mysqli->query($sql);

  $i=0;
  // формируем массив с данными по КП 
  if ($query -> num_rows > 0) {
         while ($row = $query -> fetch_assoc()) 
         {
          for ($k=0; $k<9; $k++) 
               {
               $up_cat_arr[$i]['id'] = $row["id"];
               $up_cat_arr[$i]['name'] = $row["name"];
               $up_cat_arr[$i]['number'] = $row["number"];
               $up_cat_arr[$i]['parrent_id'] = $row["parrent_id"];
               $up_cat_arr[$i]['link'] = $row["link"];
               $up_cat_arr[$i]['close'] = $row["close"];
   
               }
              //  echo $up_cat_arr[$i]['name']."<br>";
          $i++;
           
       }
     }

for ($i=0; $i<count($up_cat_arr); $i++) 
{
$level=0;
$parrent_ok = 0;
$name = $up_cat_arr[$i]['name'];
$id   = $up_cat_arr[$i]['id'];
$parrent_id = $up_cat_arr[$i]['parrent_id'];
// Ищем, есть ли подкатегории
$ParCat = FindParrentCategory($up_cat_arr[$i], $up_cat_arr); // получаем массив подкатегорий
// echo "<br>".$id;
 }

echo "Длина массива=". $max_len = count($up_cat_arr);

echo "<pre>";
var_dump($ParCat);
echo "<pre>";

  for ($i=0; $i<count($ParCat); $i++) {
      // echo "PARENT ID=".$ParCat[$i][0]['parrent_id']."<br>";
      if (isset($ParCat[$i][0]['parrent_id'])) { 
      foreach ($ParCat[$i] as $key => $value) {
          foreach ($value as $key1 => $jjj)  { 
            if (($key1 == "name") or ($key1 == "id")) {
              echo "<br> 8888888 $key1 :".$jjj;
            } 
         }
      echo "<br>";
      }
    }
  }

echo "<br> -------------------------------------";


// for ($i=0; $i<$max_len; $i++)  {
//   $id = $up_cat_arr[$i]['id'];
//   echo "<br> ----TYT ID CATEGORY__". $id."==++" ;
//   for ($j=0; $j<$max_len; $j++)  {
 
//     if (isset($ParCat[$i][$j]['isk']))

//         {
//           PrintArray($ParCat[$i][$j]);
//         }

//  }
// }



function PrintArray ($array) {
  foreach ($array as $key => $value) {
    echo "<br>$key :".$value;
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
function FindParrentCategory($arr, $all_arr){
$k=0;
  for ($i=0; $i<count($all_arr); $i++) {
     if ($arr['id'] == $all_arr[$i]['parrent_id']) {
       $sub_arr[$k] = $arr[0];
       $sub_arr[$k]['isk'] = "111";
       echo "3333!!<br>";
       $k++;
      } else {
      $sub_arr[$k] = $arr[$i];
      echo "dsdsd3333!!<br>";
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