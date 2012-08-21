Tweet Slider V3

Tweet Slider is what you'd expect; it pulls in latest tweets from Twitter and displays them in a configurable slider.

V3 Changelog:

*NEW FEATURE* PHP Caching: The Plugin now calls get_tweets.php which is part of the package. It should be added to the same directory as all other files. PHP also must be able to write this folder as it creates the directory and files for caching. This also fixes the issue raised on Git by lmorgan69a, which was reported as ie9 crashing, but was actually the auto-refresh (see below) failing to bring in new tweets because the Twitter API limit had been reached. This only happened when the auto-refresh delay was set to short and making more than 150 requests to API per hour. Now the plugin's PHP caching feature keeps a cache and counts requests, if/when the limit is reached, or if the API request fails for any reason it uses the cached tweets.

NOTE: The plugin now calls a local url for the tweets, it's default is '/tweetslider/get_tweets.php' meaning that if you upload the plugin directory to the web root it is good to go. If not you can set the correct path manually by editing jquery.tweetslider.min.js (search options.url) or navigate to the setup.php file in the plugin folder in your browser, which will change the url for you.

NOTHER_NOTE: I have built my own system for counting requests, then I realised that the number of requests left before hitting the limit is sent back from Twitter in the Header of the response. And that Twitter also sends a 420 response code when the limit is reached. V3.1 will soon be released getting rid of its own counter, and using one or both of the above methods to prevent problems with rate limiting.

V2.5 Changelog

Adds support for Twitter Entities, for urls, hashtags and user_mentions, including hyperlinks for each.
Adds option to pull in tweets for a hashtag search or a username -- changes in options below.

V2 Changelog:

Auto-Refresh: Goes back for more tweets at a configurable interval.

Manual Slide: buttons to slide tweets manually

Plugin Options:

As everyone who uses jQuery plugins will know they most often come with a set of options that you can change to make the plugin work how you like. Like the lightweight and simple nature of Tweet Slider the options are also a simple bunch.

username: - the username who's tweets to pull in - default: ''
hash: - Defaults to Twitter. Setting a username will override the hash and display the user's tweets
slides - Number of Tweets to display - default: 5
width - Width of slider - default: 500
speed -	Speed of sliding animation - default: ‘slow’ (accepts 'slow','medium','fast', or milliseconds as int)
refreshTime - Time between calls to the Twitter API to refresh tweets in milliseconds. 600000 = 10 mins default: 600000
path_to_get_tweets: - path to the get_tweets.php file - default: '/tweetslider/get_tweets.php' // this is not needed if the plugin directory is put in the web root.

Usage:

Simply download the tweetslider plugin as a .zip file, extract all files, and upload the entire tweetslider folder onto your web server, reference the stylesheet style.css like so (assumes directory added to Web Root):

<link rel="stylesheet" href="/tweetslider/style.css" />

and reference the jquery.tweetslider.min.js folder in a script tag like so:

<script type="text/javascript" src="/tweetslider/jquery.tweetslider.min.js"></script>

Both examples above assume the plugin folder is in the web root. If you don't put it in the web root then obviously these paths will change. You will also need to change the url the plugin calls to get the tweets. The easiest way to do this is to navigate to the setup.php script in the plugin directory in your web browser. It will do the work for you. If you want you can edit jquery.tweetslider.min.js, search options.url and change the value from /tweetslider/get_tweets.php to whatever the correct value is.

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
