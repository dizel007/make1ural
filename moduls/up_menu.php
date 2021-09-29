<?php

     echo <<<HTML
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="container-fluid">
   
         <a class="navbar-brand" href="#">TradeStrom</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
   
   
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
   
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li><a class="nav-link dropdown-inline" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                 aria-expanded="false"> О КОМПАНИИ </a> </li>
   
             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle dropdown-inline" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false"> ПРОДУКЦИЯ </a>
               <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown "> -->
HTML;


require_once ("catalog_up_menu.php");

echo <<<HTML
          <!-- </ul> -->
         </div>
       </div>
       </div>
     </nav>
HTML;











?>