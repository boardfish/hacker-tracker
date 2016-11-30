<?php require_once __DIR__ . "/vendor/autoload.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Summary</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php
    //event query
    $db = (new MongoDB\Client)->hacker_tracker;
    $hack_event = $db->overall_event->findOne([], [
      'projection' => ["_id" => 0]
    ]);
    ?>
    <div class="container">
      <div class="jumbotron">
        <h1><?=$hack_event['event_name']?><br><small><?= "{$hack_event['start_date']} - {$hack_event['end_date']}"?></small></h1>
      </div>
      <div class="well">
        <p>
          We hope you had a great time at <?=$hack_event['event_name']?>, on behalf of MLH and all of the sponsors!
          Be sure to attend more hackathons and get that point score up!
        </p>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <?php include "githubProfiles.php" ?>
          <h1><a href="http://github.com/undying-fish/hacker-tracker">hacker-tracker</a></h1>
        </div>
          <!--PHP insert github repository link here-->

        <div class="col-sm-8">
      <table class="table table-hover table-responsive">
        <tr>
          <th>
            Time
          </th>
          <th>
            Source
          </th>
          <th>
            Content
          </th>
        </tr>
        <?php
        $user_events = $db->events->find();
        foreach ($user_events as $event): ?>
          <tr>
            <td><?= $event['time'] ?></td>
          <?php
          switch($event["source"]):
            case "standard": ?>
              <td>
                <span class="glyphicon glyphicon-dashboard"></span>
                <?= $event["event_type"] ?>
              </td>
            <?php
              break;
            case "twitter": ?>
              <td>
                <span class="glyphicon glyphicon-user"></span>
                <?= $event["event_type"] ?>
              </td>
            <?php
              break;
            case "github": ?>
              <td>
                <span class="glyphicon glyphicon-cloud-download"></span>
                <?= $event["event_type"] ?>
              </td>
            <?php
              break;
          endswitch;
        ?>
          <td><?= $event["event_value"] ?></td>
        </tr>
        <?php
        endforeach;
        ?>
      </table>
    </div>
  </body>
</html>
