<?php
ini_set('display_errors', '0');
require_once __DIR__ . "/vendor/autoload.php";
require_once "results.php";
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hacker Tracker</title>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
    <style>
      
      .nav a:hover {
      color: #ffffff;
      text-decoration: underline;
      }

      .nav a {
      text-transform: uppercase;
      text-decoration: none;
      color: #e67e22;
      font-family: 'Muli', sans-serif;
      font-size: 22px;
      }

      
      .fixed-nav-bar {
      position: fixed;
      top: 0;
      right: 0;
      z-index: 9999;
      width: 100%;
      height: 50px;
      background-color: #000000;
      }
      
      a {
        text-decoration: none;
      }

      .InitialContent h1, p {
        color: #FFFFFF;
        font-family: 'Muli', sans-serif;
        text-align: center;
      }
      
      .InitialContent h1 {
        font-size: 75px;

      }
      
      .InitialContent p {
        font-size: 20px;
      }
      
      .eventSection {
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Muli', sans-serif;
        text-align: center;
      }
      
      .eventSection h1 {
        color: #e67e22;
      }
      
      .Profiles {
        padding-top: 10px;
        padding-bottom: 10px;
        font-family: 'Muli', sans-serif;
        text-align: center;
      }
      
      .Profiles h1 {
        color: #e67e22;
      }
      
      .hackathonSection {
        text-align: center;
        font-family: 'Muli', sans-serif;
        color: #e67e22;
      }
      
      .table1 {
        color: #FFFFFF;
      }
      
      .table2 {
        color: #FFFFFF;
      }
      
      .Logo {
        text-align: center;
      }
      
      .btn {
        position: relative;
        display: block;
        margin: 30px auto;
        padding: 0;
        font-family: 'Muli', sans-serif;
        overflow: hidden;

        border-width: 0;
        outline: none;
        border-radius: 2px;
        box-shadow: 0 1px 4px rgba(0, 0, 0, .6);
  
        background-color: #2ecc71;
        color: #ecf0f1;
  
        transition: background-color .3s;
      }

      

.btn > * {
  position: relative;
}

.btn span {
  display: block;
  padding: 12px 24px;
}

.btn:before {
  content: "";
  
  position: absolute;
  top: 50%;
  left: 50%;
  
  display: block;
  width: 0;
  padding-top: 0;
    
  border-radius: 100%;
  
  background-color: rgba(236, 240, 241, .3);
  
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -o-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.btn:active:before {
  width: 120%;
  padding-top: 120%;
  
  transition: width .2s ease-out, padding-top .2s ease-out;
}

/* Styles, not important */
*, *:before, *:after {
  box-sizing: border-box;
}

html {
  position: relative;
  height: 100%;
}


.btn.orange {
  background-color: #e67e22;
}

.btn.orange:hover, .btn.orange:focus {
  background-color: #d35400;
}

    </style>
    
    <link rel="stylesheet" href="/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/jquery-ui/jquery-ui-timepicker-addon.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
    <script src="jquery-ui/jquery-ui.min.js"></script>
    <script src="jquery-ui/jquery-ui-timepicker-addon.js" charset="utf-8"></script>
    <script>
    $(document).ready(function() {
      console.log( "ready!" );
      $( "main div.hackathonSection .datetimepicker" ).datepicker();
      $('main #event').hide();
      $select = $('#eventType');
      $('#annoyance').hide();
      $('#teamName').show();
      $('#sleep').hide();
      $('#wake').hide();
      $('#alpha').hide();
      $('#werewolf').hide();
      var currentTime = new Date().toTimeString();
      document.getElementById('date').setAttribute('value', currentTime);
      $("form :input").change(function() {
        console.log($(this).closest('form').serialize());
      });

      $select.change(function(){
          if($(this).val() == "annoyance"){
              if($('#annoyance').is(":hidden")){
                  $('#annoyance').slideDown();
              }
              $('#teamName').hide();
              $('#sleep').hide();
              $('#wake').hide();
              $('#alpha').hide();
              $('#werewolf').hide();
          }
          if($(this).val() == "teamName"){
              if($('#teamName').is(":hidden")){
                  $('#teamName').slideDown();
              }
              $('#annoyance').hide();
              $('#sleep').hide();
              $('#wake').hide();
              $('#alpha').hide();
              $('#werewolf').hide();
          }
          if($(this).val() == "sleep"){
              if($('#sleep').is(":hidden")){
                  $('#sleep').slideDown();
              }
              $('#annoyance').hide();
              $('#teamName').hide();
              $('#wake').hide();
              $('#alpha').hide();
              $('#werewolf').hide();
          }
          if($(this).val() == "wake"){
              if($('#wake').is(":hidden")){
                  $('#wake').slideDown();
              }
              $('#annoyance').hide();
              $('#sleep').hide();
              $('#teamName').hide();
              $('#alpha').hide();
              $('#werewolf').hide();
          }
          if($(this).val() == "alpha"){
              if($('#alpha').is(":hidden")){
                  $('#alpha').slideDown();
              }
              $('#annoyance').hide();
              $('#sleep').hide();
              $('#wake').hide();
              $('#teamName').hide();
              $('#werewolf').hide();
          }
          if($(this).val() == "werewolf"){
              if($('#werewolf').is(":hidden")){
                  $('#werewolf').slideDown();
              }
              $('#annoyance').hide();
              $('#sleep').hide();
              $('#wake').hide();
              $('#alpha').hide();
              $('#teamName').hide();
          }
          });

          $('nav ul #TheEvent').click(function () {
            console.log("showevent executed");
            $('main #eventProfile').show();
            $('main #GitHubProfiles').hide();
            $('main #event').hide();
            return false;
          });
          $('nav ul #YourTeam').click(function () {
            console.log("showyourteam executed");
            $('main #eventProfile').hide();
            $('main #GitHubProfiles').show();
            $('main #event').hide();
            return false;
          });
          $('nav ul #Milestones').click(function () {
            console.log("showmilestones executed");
            $('main #eventProfile').hide();
            $('main #GitHubProfiles').hide();
            $('main #event').show();
            return false;
          });
    });
    </script>
    <style>
      
    </style>
  </head>
  <body style="background-color:#000000;">
    <!--<header>-->
    <!--  <h1>Hacker Tracker</h1>-->
    <!--  <h2>Complete documentation for your hackathon!</h2>-->
    <!--</header>-->
    
    
    <nav class='fixed-nav-bar' >
    <div class='nav' >
      <div class='container'>
        <ul style="display: inline-flex; list-style: none;">
        <li style="padding-left: 25px;"><a href="#" id="TheEvent">The Event</a></li>
        <li style="padding-left: 25px;"><a href="#" id="YourTeam">Your Team</a></li>
        <li style="padding-left: 25px;"><a href="#" id="Milestones">Milestones</a></li>
        </ul>
      </div>
    </div>
    </nav>
    <main>
      <?php validateForm(); ?>
      <div class="InitialContent">
        <h1>Welcome to</h1>
        <div class="Logo">
        <img src="/hackertracker.png" border="0" alt="postimage" width="650" height="100">
        </div>
        <p>
          Welcome to another great MLH hackathon! There are new people to meet, new places to go, <br>and most of all, new levels of tiredness to reach (of course).</br>
        </p>
          
        <p>But we won't let this go forgotten! Use <strong>Hacker Tracker</strong> to document your hackathon, from those awkward planning <br>stages to another intense game of Werewolf,</br> and maybe to the time you'll get your hands on an award.
        </p>
      </div>
      <div id="eventProfile" class="eventSection"> <!--Most of this to be deprecated?
      Intending to scrape MLH pages for this, but it could be tough.-->
        <h1>The Event</h1>
        <p>
          Feed in the details of the event here.
        </p>
        
        <div class="table1">
        <form method="post" action="">
        <table align="center" border="1">
          <tr>
            <td>Event Name</td>
            <td colspan="3"><input type="text" value="" size="70"></td>
          </tr>
          <!--Firefox doesn't support datetime types, need a solution!!-->
          <tr>
            <td>Hacking Start Time</td>
            <td><input class="datetimepicker" type="text" name="startdate"></td>
            <td><input type="number" name="starthour" min="0" max="23" value=""></td>
            <td><input type="number" name="startmin" min="0" max="59" value=""></td>
          </tr>
          <tr>
            <td>Hacking End Time</td>
            <td><input class="datetimepicker" type="text" name="enddate"></td>
            <td><input type="number" name="endhour" min="0" max="23" value=""></td>
            <td><input type="number" name="endmin" min="0" max="59" value=""></td>
          </tr>
        </table>
        </div>
        <button class="btn orange" type="button"><span>
          Submit</span>
        </button>
        
                  <!--<p><input type="submit" value="Submit"></p>-->

        </form>
      </div>
      <div id="GitHubProfiles" class="Profiles">
        <h1>Your Team</h1>
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
        <div class="table2">
          
        <table border="1" align="center">
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
        <button class="btn orange" type="button"><span>
          Submit</span>
        </button>
        <!--<p><input type="submit" value="Submit"></p>-->
        </form>
      </div>
    </div>
      <div id="event" class="hackathonSection">
        <h1>Events</h1>
        <p>Don't let the greatest moments of your hackathon fall under a surge of <br>sleepiness or (Torvalds forbid) an avalanche of alcohol. List any major milestones your group hit here!</br>
        </p>
        <select id="eventType" name="eventType">
          <option value="annoyance">Annoyance Discovered</option>
          <option value="teamName" selected="selected">Team Name Chosen</option>
          <option value="sleep">Team Member Sleeps</option>
          <option value="wake">Team Member Awakens</option>
          <option value="alpha">Working Alpha Created</option>
          <option value="werewolf">Werewolf Played</option>
        </select>
        <form id="eventContent" class="forms" action="" method="post">
            <input id="annoyance" name="annoyanceContent" type="text" placeholder="What bug did you find?" size="60"/>
            <input id="teamName" name="teamNameContent" type="text" placeholder="What have you crowned your team?" size="60"/>
            <input id="sleep" name="sleepContent" type="text" placeholder="Who's sleeping?" size="60"/>
            <input id="wake" name="wakeContent" type="text" placeholder="Who has awakened?" size="60"/>
            <input id="alpha" name="alphaContent" type="text" placeholder="What's the commit ID of your alpha?" size="60"/>
            <input id="werewolf" name="werewolfContent" type="text" placeholder="Who's playing Werewolf?" size="60"/>
            <input id="date" name="date" type="text" style="display:none;"> <!--might not work?...-->
            
            <button class="btn orange" type="button"><span>
            Submit</span>
            </button>
            <!--<input type="submit" value="Submit">-->
        </form>
      </div>
    </main>
    <footer>
      <p>
        By <a href="http://github.com/undying-fish" style="color:#e67e22";>Simon Fish</a>, <a href="http://github.com/SanzianaCH" style="color:#e67e22";>Sanziana Chiorescu</a>, <a href="http://github.com/szen95" style="color:#e67e22";>Tzen Szen</a> and <a href="http://github.com/darrenvong" style="color:#e67e22";>Darren Vong</a>.
      </p>
    </footer>
  </body>
</html>
