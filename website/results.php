<?php

function validateForm() {
  //clear errors and valid entries from previous calls first
  clearSessionData();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['post_key'] == "events") {
      // Get the selected event type
      $_SESSION['valid']["event_type"] = $_POST["eventType"];
      // Then check whether the selected event has a value
      if (!$_POST[$_POST["eventType"]."Content"]) {
        $_SESSION['errors'][$_POST["eventType"]."Content"] = true;
      }
      else {
        $filtered_value = htmlspecialchars(strip_tags($_POST[$_POST["eventType"]."Content"]));
        $_SESSION['valid']["event_value"] = $filtered_value;
      }

      if (empty($_SESSION['errors'])) {
        //No errors, so add the user submitted event to db
        $collection = (new MongoDB\Client)->hacker_tracker->events;
        $event_details = [];
        foreach ($_SESSION['valid'] as $event_key => $value) {
          $event_details[$event_key] = $value;
        }
        $event_details["source"] = "custom";
        var_dump($_SESSION['errors']);
        var_dump($event_details);
        $collection->insertOne($event_details);
      }
    }
    // A request has been sent for adding people in the hackathon team
    else if ($_POST['post_key'] == "people") {
      echo "11111111";
      foreach($_POST as $name => $value) {
        $value = htmlspecialchars(strip_tags($value));
        if (!preg_match('/[\w]+/', $value)) {
          $_SESSION['errors'][$name] = true;
        }
        else {
          $field_info = getFieldInfoFromName($name);
          //$field_info[1] gives the team member number, $field_info[2] gives the name handle/type (name, twitter, github)
          $_SESSION['valid'][$field_info[1]][$field_info[2]] = $value;
        }
      }

      //No errors
      if (empty($_SESSION['errors'])) {
        // So try and insert the data into MongoDB

        // The "people" collection in the hacker_tracker database
        $collection = (new MongoDB\Client)->hacker_tracker->people;
        foreach ($_SESSION['valid'] as $user_id => $user_details) {
          $user_details_arr = [];
          //skip some weird blank key??
          if ($user_id == "") continue;
          foreach ($user_details as $name => $value) {
            $user_details_arr[$name] = $value;
          }
        $insertOneResult = $collection->insertOne($user_details_arr);
        }
      }
    }
    // Request sent for adding an associated overall hackathon event
    else if ($_POST['post_key'] == "overall_event") {
      foreach($_POST as $name => $value) {
        $value = htmlspecialchars(strip_tags($value));
        //event_name, startdate, enddate, starthour, startmin
        //endhour, endmin
        if (!preg_match('/[\w]+/', $value)) {
          $_SESSION['errors'][$name] = true;
        }
        else {
          $_SESSION['valid'][$name] = $value;
        }
      }

      if (empty($_SESSION['errors'])) {
        //No errors up to here, so add the overall event to db
        $collection = (new MongoDB\Client)->hacker_tracker->overall_event;
          $event_details = [];
        foreach ($_SESSION['valid'] as $event_key => $value) {
          $event_details[$event_key] = $value;
        }
        $collection->insertOne($event_details);
      }
    }
    else {
      die("Unrecognised request - stop hacking the form!");
    }
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
