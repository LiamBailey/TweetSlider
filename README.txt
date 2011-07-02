Tweet Slider V2 is now a lightweight jQuery plugin.

It has the following new features:

Auto-Refresh: Tweet Slider V1 would load the latest tweets for the given user once per page load, meaning it would not pick up new Tweets without refreshing the page. Tweet Slider v2.1 automatically refreshes asynchronously (without reloading the page) every 10 minutes (the time can be changed by the user, but this will be covered in the options section).

Manual Slide: In Tweet Slider v2.1 we have added next and previous buttons to manually slide the tweets.
Plugin Options:

As everyone who uses jQuery plugins will know they most often come with a set of options that you can change to make the plugin work how you like. Like the lightweight and simple nature of Tweet Slider the options are also a simple bunch.

username - the username who's tweets to pull in - default: 'Twitter'
slides - Number of Tweets to display - default: 5
width - Width of slider - default: 500
speed -	Speed of sliding animation - default: ‘slow’ (accepts 'slow','medium','fast', or milliseconds as int)
refreshTime - Time between calls to the Twitter API to refresh tweets in milliseconds. 600000 = 10 mins default: 600000

Usage:

Simply download the tweetslider plugin as a .zip file, extract all files, and upload the entire tweetslider folder onto your web server, reference the stylesheet style.css like so (assumes directory added to Web Root):

<link rel="stylesheet" href="/tweetslider/style.css" />

and reference the jquery.tweetslider.min.js folder in a script tag like so:

<script type="text/javascript" src="/tweetslider/jquery.tweetslider.min.js"></script>

Then create a holder for the slider, I have chosen a div with the id tweets.

<div id="tweets"></div>

And call it like so

<script type="text/javascript">
$(document).ready(function() {
$("#tweets").tweetSlider({
username: ‘yourusername’

})
})

Of course adding any other options you want to change below username with comma delimeters. And that is it. I hope you enjoy using Tweetslider V2.
