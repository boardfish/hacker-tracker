$(document).ready(function() {
  console.log( "ready!" );
  $( "main div.hackathonSection .datetimepicker" ).datepicker({dateFormat: "dd-mm-yy"});
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
