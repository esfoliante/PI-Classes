<?php

@session_start();

include './functions/database.inc.php';
include './functions/functions.inc.php';

$information = [
  "hostname" => "localhost",
  "username" => "root",
  "password" => "root",
  "database" => "site_101"
];

$connection = db_connect($information);

$items = db_query($connection, "SELECT * FROM menus A INNER JOIN menus_idiomas B ON A.ID = B.ID WHERE
A.estado = 1 AND A.pai=0 AND B.lang='". $_SESSION['language'] . "'");


function loadMenuItems($items)
{
  global $connection;

  foreach ($items as $item) {

    $children = db_query($connection, "SELECT * FROM menus A INNER JOIN menus_idiomas B ON A.ID = B.ID WHERE
    A.estado = 1 AND A.pai=" . $item['ID'] . " AND B.lang='". $_SESSION['language'] . "'");

    if (count($children) > 0){
      echo '<li><a href="javascript:void(0)">' . $item['nome'] . '<span class="arrow-down"></span></a>';
      echo '<ul class="dropdown">';
      loadMenuItems($children);
      echo '</ul>';
    } else {
       echo '<li><a href="javascript:void(0)">' . $item['nome'] . '<span></span></a>';
    }

    echo '</li>' . "\n";
  }
}

$languages = [
  [
    "slug" => "pt",
    "name" => "Português",
    "flag" => "https://www.countryflags.io/pt/flat/32.png",
  ],
  [
    "slug" => "en",
    "name" => "English",
    "flag" => "https://www.countryflags.io/gb/flat/32.png",
  ],
  [
    "slug" => "ch",
    "name" => "汉语",
    "flag" => "https://www.countryflags.io/cn/flat/32.png",
  ],
  [
    "slug" => "ru",
    "name" => "русский",
    "flag" => "https://www.countryflags.io/ru/flat/32.png",
  ],
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Site 101</title>
  <link rel="stylesheet" href="css/main.css" />
  <script src="js/main.js"></script>
</head>

<body>
  <div id="main">
    <h3>Select a language:</h3>

    <?php
            foreach($languages as $idiom) {
              ?>
    <div style="display: flex; list-style-type: none;">
      <img src="<?php echo $idiom['flag'] ?>" style="margin-right: 5px;" />
      <li><a href="./php/language.php?lang=<?php echo $idiom['slug'] ?>"><?php echo $idiom['name'] ?></a>
      </li>
    </div>
    <?php
            }
          ?>

    <div class="container">
      <div style="margin-top: 150px; margin-bottom: 30px; text-align: center">
        <img src="imgs/logo.png" style="width: 100px; margin-bottom: 15px" />
        <h1>Material Design Responsive Menu</h1>
      </div>
      <nav>
        <div class="nav-fostrap">
          <?php loadMenuItems($items) ?>
        </div>
        <div class="nav-bg-fostrap">
          <div class="navbar-fostrap">
            <span></span> <span></span> <span></span>
          </div>
          <a href="" class="title-mobile">Fostrap</a>
        </div>
      </nav>
      <div class="content"></div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
</body>

</html>