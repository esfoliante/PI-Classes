<?php

@session_start();

include '../functions/database.inc.php';
include '../functions/functions.inc.php';

$information = [
  "hostname" => "localhost",
  "username" => "root",
  "password" => "root",
  "database" => "site_009"
];

$connection = db_connect($information);

$items = db_query($connection, "SELECT * FROM catalogo A INNER JOIN catalogo_translated B ON A.ID = B.item_id WHERE A.active = 1 AND A.parent=0 AND B.language='". $_SESSION['language'] . "'");

function loadMenuItems($items)
{
  global $connection;
  
  foreach ($items as $item) {

    $children = db_query($connection, "SELECT * FROM catalogo A INNER JOIN catalogo_translated B ON A.ID = B.item_id WHERE A.active = 1 AND A.parent=" . $item['item_id'] . " AND B.language='". $_SESSION['language'] . "'");
  


    echo '<li><a href="#">' . $item['translated']. '</a>';

    if (count($children) > 0){
    echo '<ul>';
      loadMenuItems($children);
      echo '</ul>';
    }

    echo '</li>' . "\n";
  }
}

$languages = [
  [
    "slug" => "pt",
    "name" => "Portugês",
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
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>SmartMenus jQuery Website Menu - jQuery Plugin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




  <!-- SmartMenus core CSS (required) -->
  <link href="../css/sm-core-css.css" rel="stylesheet" type="text/css" />

  <!-- "sm-blue" menu theme (optional, you can use your own CSS, too) -->
  <link href="../css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />




  <!-- YOU DO NOT NEED THIS - demo page content styles -->
  <link href="../libs/demo-assets/demo.css" rel="stylesheet" type="text/css" />

</head>

<body>




  <nav id="main-nav">
    <!-- Sample menu definition -->
    <ul id="main-menu" class="sm sm-blue">
      <?php loadMenuItems($items) ?>
    </ul>
  </nav>




  <!-- YOU DO NOT NEED THIS - demo page content -->
  <div class="columns">
    <div class="left-column">
      <div id="content">
        <h1>SmartMenus</h1>
        <p>jQuery website menu plugin. Responsive and accessible list-based website menus that work on all devices.</p>
        <ul>
          <li><a href="http://www.smartmenus.org/docs/">Getting started and API documentation</a></li>
          <li><a href="https://github.com/vadikom/smartmenus/issues">Bugs and issues</a></li>
          <li><a href="http://www.smartmenus.org/forums/">Support forums</a></li>
          <li><a href="http://www.smartmenus.org/support/premium-support/">Premium support</a></li>
        </ul>
        <h2>Linguas</h2>
        <p>Escolha uma das seguintes linguas:</p>
        <ul>
          <?php
            foreach($languages as $idiom) {
              ?>
          <div style="display: flex; list-style-type: none;">
            <img src="<?php echo $idiom['flag'] ?>" style="margin-right: 5px;" />
            <li><a href="../../php/language.php?lang=<?php echo $idiom['slug'] ?>"><?php echo $idiom['name'] ?></a>
            </li>
          </div>
          <?php
            }
          ?>
        </ul>
        <p><a href="http://www.smartmenus.org/about/themes/#demos-gallery" class="gray-button">Online demos + themes
            gallery &raquo;</a></p>
      </div>
    </div>
    <div class="right-column"></div>


  </div>




  <!-- jQuery -->
  <script type="text/javascript" src="../libs/jquery/jquery.js"></script>

  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="../jquery.smartmenus.js"></script>

  <!-- SmartMenus jQuery init -->
  <script type="text/javascript">
    $(function () {
      $('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
      });
    });
  </script>




  <!-- YOU DO NOT NEED THIS - demo page themes switcher -->
  <script type="text/javascript" src="../libs/demo-assets/themes-switcher.js"></script>

</body>

</html>