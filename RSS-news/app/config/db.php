<?php
  $opt = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  );
  
  $db = new PDO("mysql:host=localhost;dbname=sg_news;charset=utf8", "dbuser", "123", $opt);