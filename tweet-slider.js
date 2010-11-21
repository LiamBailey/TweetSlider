/*
Do Not Remove:
Jquery Twitter Client to Display Tweets
in a horizontal slider by Small Coders
a Subsidiary of Galloway Web Services 
*/

//insert username below//
$(document).ready(function() {
setInterval('tweet_slider(\'INSERTUSERNAMEHERE\')',4000);
})

// DO NOT EDIT BELOW THIS LINE
// unless you know what you're doing
function tweet_slider(username) {
var elm = $('#tweets ul li');
ct = elm.length-1;
if (ct < 0) { grab_tweets(username); }
ct = ct*-500;
c = $(elm).css('left');
c = parseInt(c);
if (c == ct) 
 {
  $(elm).animate({
   left: '0px'
  },500);
 }
 else 
 {
$(elm).animate({
	left: '-=500px'
	},500);
 }
 }


function grab_tweets(user) {
var baseUrl = "https://api.twitter.com/1/statuses/user_timeline.json";
$.getJSON(baseUrl + "?callback=?","&screen_name=" + user + "&count=6", function(data) 
 {
  for (e = 0;e < data.length; e++) 
	 {
    $('<li></li>')
    .append('<div>')
    .append('<img align="left" src="' + data[e].user.profile_image_url + '" />')
    .append('<span><a href="http://www.twitter.com/'
     +
    data[e].user.screen_name + '">' + data[e].user.screen_name
     +
    '</a>&nbsp;' + data[e].text + '</span>')
    .append('</div>')
    .appendTo('#tweets > ul');
   }
  x = $("#tweets ul li");
  if (x.length > 0) 
	 {
	  $("<h4>We Tweet</h4>").prependTo("#tweets");
    $("#tweets").css("height","auto");
    }
  });
}

