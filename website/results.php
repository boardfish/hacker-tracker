<?php

function validateForm() {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //clear errors and valid entries from previous call first
    clearSessionData();
    
    foreach($_POST as $name => $value) {
      $value = htmlspecialchars(strip_tags($value));
      if (!preg_match('/[\w]+/', $value)) {
        $_SESSION['errors'][$name] = true;
      }
      else {
        $field_info = getFieldInfoFromName($name);
        $_SESSION['valid'][$field_info[1]][$field_info[2]] = $value;
      }
    }
    //No errors
    if (empty($_SESSION['errors'])) {
      // So try and insert the data into MongoDB

      // The "people" collection in the hacker_tracker database
      $collection = (new MongoDB\Client)->hacker_tracker->people;

      foreach ($_SESSION['valid'] as $user_id => $user_details) {
        $insertOneResult = $collection->insertOne([
          'name' => $user_details['name'],
          'github_name' => $user_details['github'],
          'twitter_name' => $user_details['twitter']
        ]);
      }
    }
  }
  // Clear any errors that comes from previous sessions that does not apply
  else {
    clearSessionData();
  }
}

function clearSessionData() {
  $_SESSION['errors'] = array();
  $_SESSION['valid'] = array();
}

function getFieldInfoFromName($name) {
  $matches = array();
  if (preg_match("/teammate(\d)+([\w]+)?/", $name, $matches)) {
    return $matches;
  }
}
