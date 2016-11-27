<?php
require_once __DIR__ . "/vendor/autoload.php";
$people = (new MongoDB\Client)->hacker_tracker->people;
$cursor = $people->find();
$i = 0
foreach ($cursor as $person) {
  # code...
  $i+=1;
  switch ($i) {
    case 3:
      echo $person["github"] . ", and ";
      break;
    case 4:
      echo $person["github"] . " present...";
      break;
    default:
      echo $person["github"] . ", ";
      break;
  }
}
 ?>
