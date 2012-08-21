<?php
/* This script is needed to set the correct url for the get_tweets.php script in the tweetslider plugin js file */

$scriptcontents = file_get_contents("jquery.tweetslider.min.js");
$replacestring = "options.url='/tweetslider/get_tweets.php';";
$newurl = pathinfo($_SERVER['PHP_SELF']);
$newurl = "options.url='".$newurl['dirname'] . "/get_tweets.php';";
$newcontents = str_replace($replacestring,$newurl,$scriptcontents);
file_put_contents("jquery.tweetslider.min.js",$newcontents);
echo "The new url for the script has been set to " . $newurl;
