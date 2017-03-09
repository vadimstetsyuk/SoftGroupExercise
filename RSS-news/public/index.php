<?php
  require_once('../vendor/autoload.php');

  require_once('../app/config/settings.php');

  require_once('../app/components/Paginator.php');

  $stm = $db->query("select * from news");

  $items = array();
  while($row = $stm->fetch()){
      $items[] = $row;
  }

  $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;

  $perPage = 10;

  $currentItems = array_slice($items, $perPage * ($currentPage - 1), $perPage);


  $paginator = new Paginator($currentItems, count($items), $perPage, $currentPage);

 ?>
<html>
  <head>
    <title>RSS news</title>
    <link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css">
     <link rel = "stylesheet" type = "text/css" href = "./css/style.css">
  </head>
  <body>
    <div class = "container">
      <div class = "row">
        <div  class = "col-md-12">
          <div class="well">
            <div class="list-group">
              <?php
                foreach($paginator->items() as $item){
                  echo <<<ITEM
                  <div class="list-group-item">
                    <div class="media col-md-3">
                              <a href = " . {$item["link"]} . ">{$item["title"]}</a>
                              <h6></h6>
                    </div>
                    <div class="col-md-6">
                             <h4 class="list-group-item-heading">Опис</h4>
                             <p class="list-group-item-text">
                                {$item["description"]}
                             </p>
                             <h4 class="list-group-item-heading">Джерело</h4>
                             <p class="list-group-item-text">
                                {$item["source"]}
                             </p>
                    </div>
                    <div class="col-md-3 text-center">
                            <h6>Дата</h6>
                            {$item["pub_data"]}
                    </div>
                  </div>
ITEM;
                }
               ?>
            </div>
          </div>
          <div class = "center">
              <div class = "pagination">
                    <?=$paginator->render()?>
              </div>
          </div>
        </div>
      </div>
  </div>
  </body>
</html>