<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hacker Tracker</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js" charset="utf-8"></script>
  </head>
  <body>
    <header>
      <h1>Hacker Tracker</h1>
      <h2>Complete documentation for your hackathon!</h2>
    </header>
    <main>
      <div id="InitialContent">
        <h1>Welcome.</h1>
        <p>
          Welcome to another great MLH hackathon! There are new people to meet, new places to go, and most of all, new levels of tiredness to reach (of course). But we won't let this go forgotten! Use <strong>Hacker Tracker</strong> to document your hackathon, from those awkward planning stages to another intense game of Werewolf, and maybe to the time you'll get your hands on an award.
        </p>
      </div>
      <div id="eventProfile" class="hackathonSection"> <!--to be deprecated?
      Intending to scrape MLH pages for this, but it could be tough.-->
        <p>
          Feed in the details of the event here.
        </p>
        <form method="post" action="">
        <table border="1">
          <tr>
            <td>Event Name</td>
            <td><input type="text" value=""></td>
          </tr>
          <!--Firefox doesn't support datetime types, need a solution!!-->
          <tr>
            <td>Hacking Start Time</td>
            <td><input type="number" name="starthour" min="0" max="23"><input type="number" name="startminute" min="0" max="59"></td>
          </tr>
          <tr>
            <td>Hacking End Time</td>
            <td><input type="number" name="endhour" min="0" max="23"><input type="number" name="endminute" min="0" max="59"></td>
          </tr>
          <!--If no datetime solution found, assume that if endtime<starttime the event crosses today and tomorrow.
          Obviously this means hackathons of more than 2 days can't be entered yet...--->
        </table>
        <p><input type="submit" value="Submit"></p>
        </form>
      </div>
      <div id="GitHubProfiles">
        <p>
          Have you got a team? Input your usernames here!
        </p>
        <form method="post" action="">
        <table border="1">
          <tr>
            <td> </td>
            <td>Your name</td>
            <td>GitHub profile</td>
            <td>Twitter handle</td>
          </tr>
          <tr>
            <td>Team Member 1</td>
            <td><input type="text" name="teammate1" value=""><br></td>
            <td><input type="text" name="teammate1github" value=""><br></td>
            <td><input type="text" name="teammate1twitter" value=""><br></td>
          </tr>
          <tr>
            <td>Team Member 2</td>
            <td><input type="text" name="teammate2" value=""><br></td>
            <td><input type="text" name="teammate2github" value=""><br></td>
            <td><input type="text" name="teammate2twitter" value=""><br></td>
          </tr>
          <tr>
            <td>Team Member 3</td>
            <td><input type="text" name="teammate3" value=""><br></td>
            <td><input type="text" name="teammate3github" value=""><br></td>
            <td><input type="text" name="teammate3twitter" value=""><br></td>
          </tr>
          <tr>
            <td>Team Member 4</td>
            <td><input type="text" name="teammate4" value=""><br></td>
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
