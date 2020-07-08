<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://127.0.0.1:27017");
$db = $client -> rssReader;
$collection = $db->rssFeed;

$result = $collection->find();
foreach ($result as $item) {
  echo $item["itemTitle"] . "<br>";
  echo $item["itemLink"] . "<br>";
  echo $item["itemDescription"] . "<br><br><br>";
};
?>