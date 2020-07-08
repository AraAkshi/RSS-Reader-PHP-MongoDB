<?php
  //$keyword=$_GET["keyword"];
    header("Content-Type: application/rss+xml; charset=ISO-8859-1");
  $rssfeed = '<?xml version="1.0" encoding="ISO-8859-1"?>';
  $rssfeed .= '<rss version="2.0">';
  $rssfeed .= '<channel>';
  $rssfeed .= '<title>RSS feed</title>';
  $rssfeed .= '<link>http://www.mywebsite.com</link>';
  $rssfeed .= '<description>This is an example RSS feed</description>';
  $rssfeed .= '<language>en-us</language>';
  $rssfeed .= '<copyright>Copyright (C) 2009 mywebsite.com</copyright>';

  require 'vendor/autoload.php';
  $client = new MongoDB\Client("mongodb://127.0.0.1:27017");
  $db = $client -> rssReader;
  $collection = $db->rssFeed;

$result = $collection->find( [
  'itemDescription' => new \MongoDB\BSON\Regex('i')
]
);
foreach ($result as $item) {
  $rssfeed .= '<item>';
  $rssfeed .= '<title>' . $item["itemTitle"] . '</title>';
  $rssfeed .= '<link>' . $item["itemLink"] . '</link>';
  $rssfeed .= '<description>' . $item["itemDescription"] . '</description>';
  $rssfeed .= '</item>';
};

$rssfeed .= '</channel>';
$rssfeed .= '</rss>';

echo $rssfeed;
?>