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
    <div class="container">
      <div class="jumbotron">
        <h1>Hackathon Name<br><small>18/18/2018-19/18/2018</small></h1>
      </div>
      <div class="well">
        <p>
          We hope you had a great time at Hackathon, on behalf of MLH and all of the sponsors!
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
            <!--include php here-->
            <?php
            include(summaryTableCreator.php);
            ?>
            <!--
            <tr>
              <td>
                18:59
              </td>
              <td>
                <span class="glyphicon glyphicon-user"></span>@hacknotts
              </td>
              <td>
                I'm tired
              </td>
            </tr>
            <tr>
              <td>
                23:47
              </td>
              <td>
                <span class="glyphicon glyphicon-cloud-download"></span> ae27eh
              </td>
              <td>
                Commit message
              </td>
            </tr>
            <tr>
              <td>
                23:47
              </td>
              <td>
                <span class="glyphicon glyphicon-dashboard"></span>Fell asleep
              </td>
              <td>
                Darren fell asleep. I drew a moustache on him before realising he already had one.
              </td>
            </tr>
            -->
          </table>
        </div>
      </div>

    </div>
  </body>
</html>
