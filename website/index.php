<?php
ini_set('display_errors', '1');
require_once __DIR__ . "/vendor/autoload.php";
require_once "results.php";
session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hacker Tracker</title>
  </head>
  <body>
    <header>
      <h1>Hacker Tracker</h1>
      <h2>Complete documentation for your hackathon!</h2>
    </header>
    <main>
      <?php validateForm(); ?>
      <div id="InitialContent">
        <h1>Welcome.</h1>
        <p>
          Welcome to another great MLH hackathon! There are new people to meet, new places to go, and most of all, new levels of tiredness to reach (of course). But we won't let this go forgotten! Use <strong>Hacker Tracker</strong> to document your hackathon, from those awkward planning stages to another intense game of Werewolf, and maybe to the time you'll get your hands on an award.
        </p>
      </div>
      <div id="GitHubProfiles">
        <p>
          Have you got a team? Input your usernames here!
        </p>
        <?php
        if ($_SESSION['errors']):
        ?>
        <h3>The following fields contain invalid values:</h3>
        <ul>
        <?php
          foreach($_SESSION['errors'] as $name => $value) {
            $field_info = getFieldInfoFromName($name);
            $msg = "Team Member {$field_info[1]}'s " . $field_info[2] . (($field_info[2] == "name")? "" : "name");
            echo "<li>$msg</li>";
          }
        ?>
        </ul>
        <?php
        endif;
        ?>
        <form method="post">
        <table border="1">
          <tr>
            <td> </td>
            <td>Your name</td>
            <td>GitHub profile</td>
            <td>Twitter handle</td>
          </tr>
          <tr>
            <td>Team Member 1</td>
            <td><input type="text" name="teammate1name" value=""><br></td>
            <td><input type="text" name="teammate1github" value=""><br></td>
            <td><input type="text" name="teammate1twitter" value=""><br></td>
          </tr>
          <tr>
            <td>Team Member 2</td>
            <td><input type="text" name="teammate2name" value=""><br></td>
            <td><input type="text" name="teammate2github" value=""><br></td>
            <td><input type="text" name="teammate2twitter" value=""><br></td>
          </tr>
          <tr>
            <td>Team Member 3</td>
            <td><input type="text" name="teammate3name" value=""><br></td>
            <td><input type="text" name="teammate3github" value=""><br></td>
            <td><input type="text" name="teammate3twitter" value=""><br></td>
          </tr>
          <tr>
            <td>Team Member 4</td>
            <td><input type="text" name="teammate4name" value=""><br></td>
            <td><input type="text" name="teammate4github" value=""><br></td>
            <td><input type="text" name="teammate4twitter" value=""><br></td>
          </tr>
        </table>
        <p><input type="submit" value="Submit"></p>
        </form>
      </div>
    </main>
    <footer>
      <p>
        By <a href="http://github.com/undying-fish">Simon Fish</a>, <a href="http://github.com/SanzianaCH">Sanziana Chiorescu</a>, <a href="http://github.com/szen95">Tzen Szen</a> and <a href="http://github.com/darrenvong">Darren Vong</a>.
      </p>
    </footer>
  </body>
</html>
