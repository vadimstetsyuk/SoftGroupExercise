<?php
  require_once('vendor/autoload.php');

  $feeds = array("https://rss.unian.net/site/news_ukr.rss");

  require_once('./config/db.php');

  $sql = "insert into news (title, link, description, source, pub_data) values(?, ?, ?, ?, ?)";
  $sqlExists = "select id from news where link = ?";
  $stm = $db->prepare($sql);
  $ifHaveLink = $db->prepare($sqlExists);

  for($i = 0; $i < count($feeds);$i++)
  {
    $feed = new SimplePie();
    $feed->set_feed_url($feeds[$i]);
    $feed->enable_cache(false);
    $feed->init();
    $items = $feed->get_items();

    foreach($items as $item)
    {
      $currLink = $item->get_link();
      $ifHaveLink->execute([$currLink]);

      if (!$ifHaveLink->fetch())
      {
        $stm->execute([
          $item->get_title(),
          $item->get_link(),
          $item->get_description(),
          $item->get_base(),
          $item->get_date("Y-m-d H:i:s")
        ]);
        
        $errorInfo = $stm->errorInfo();

        if ($errorInfo[0] != 0)
          error_log($errorInfo, 3, "/var/www/sg-news.dev/logs/errors.log");
      }
    }
  }
