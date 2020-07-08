<?php

  $title=$_GET["title"];
  $link=$_GET["link"];
  $description=$_GET["description"];

  // $newText = "<p><a href=\"$link\"><img src=\"$imglink\" width=\"130\" height=\"86\" alt=\"$title\" align=\"left\" title=\"$title\" border=\"0\" ></a>$description<p><br clear=\"all\">";

  require 'vendor/autoload.php';
  $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
  $db = $client -> rssReader;
  $collection = $db->rssFeed;

  $result = $collection->insertOne([
    'itemTitle' => $title,
    'itemLink' => $link,
    'itemDescription' => $description,
  ]);

  echo ("Data Inserted");
?>