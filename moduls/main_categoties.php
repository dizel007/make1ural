<?php

$sql = "SELECT * FROM `category` ORDER BY `cat_number`"; 
$query = $mysqli->query($sql);

  $i=0;
  // формируем массив с данными по КП 
  if ($query -> num_rows > 0) {
         while ($row = $query -> fetch_assoc()) 
         {
          for ($k=1; $k<9; $k++) 
               {
               $categ_arr[$i]['id'] = $row["id"];
               $categ_arr[$i]['name'] = $row["name"];
               $categ_arr[$i]['link_pics'] = $row["link_pics"];
               $categ_arr[$i]['cat_number'] = $row["cat_number"];
               $categ_arr[$i]['link_addr'] = $row["link_addr"];
               }
          $i++;
       }
     }

//  Начало HTML контейнера с катеориями****************************************************
echo <<<HTML
<div class="container">
    <div class="d-flex flex-wrap">
HTML;

for ($i=0; $i<count($categ_arr);$i++) {
$link_addr = $categ_arr[$i]['link_addr'];
$link_pics = $categ_arr[$i]['link_pics'];
$name = $categ_arr[$i]['name'];
echo <<<HTML
      <a class="card bg" href="$link_addr">
        <div class="card-body">
          <img src="images/category/$link_pics" class="card-img-top" alt="...">
          <h5 class="card-title">$name</h5>
          <div class="blackout"></div>
        </div>
      </a>
HTML;
}

echo <<<HTML
    </div>
  </div>
HTML;
?>
