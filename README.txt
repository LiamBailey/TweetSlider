We are extremely proud of the new side sliding Twitter mini-client we have coded. We didn’t just do this for fun; one of our clients wanted to show their tweets horizontally, and we couldn’t find anything that anyone had done already to perform the task we needed, so we wrote our own (see below).

To have this on your own site simply download css and js files from github and then:

Open the file in your preferred text editor and enter the screen name of the person who’s tweets you would like to display.

Add it to your server and link to it within a script tag like so:

<script type="text/javascript" src="path-to-file/tweet-slider.js"></script>

Note: You must have jQuery installed and linked above tweet-slider.js.
Step 3: Add Placeholder

Now all you need to do is add the following to your html pages wherever you want the slider to display:

<div id="tweets">
 

  <ul></ul>
</div>

And your Tweet Slider will display when you reload the page.

Note: The slider is set to a width of 500px, which is an average of content areas. If you have a different width and would like to use the slider, please contact us using the contact form in the sidebar.