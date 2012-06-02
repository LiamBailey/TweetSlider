Tweet Slider V2.5

V2.5 Changelog:

Adds support for Twitter Entities, for urls, hashtags and user_mentions, including hyperlinks for each.
Adds option to pull in tweets for a hashtag search or a username -- changes in options below.

Tweet Slider is what you'd expect; it pulls in latest tweets from Twitter and displays them in a configurable
slider. It also has the following features:

Auto-Refresh: Goes back for more tweets at a configurable interval.

Manual Slide

Plugin Options:

As everyone who uses jQuery plugins will know they most often come with a set of options that you can change to make the plugin work how you like. Like the lightweight and simple nature of Tweet Slider the options are also a simple bunch.

username: - the username who's tweets to pull in - default: ''
hash: - Defaults to Twitter. Setting a username will override the hash and display the user's tweets
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
//set options here in option:value format i.e
hash: 'mysearch'
})
})

Of course adding any other options you want to change below username with comma delimeters. And that is it. I hope you enjoy using Tweetslider V2.
