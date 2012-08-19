<?php
/* The very bare bones of a Twitter client by Webby Scots. Tweet Slider had gone without some 
 * mechanism for PHP caching for long enough, and so I am starting simple but will build on it later.
*/

class WSWP_Twitter_Client {
	protected $request;
	protected $api_limit;
	protected $api_per;
	protected $cache_store;
	protected $cache_file;
	protected $counter;
	protected $timer;
	protected $first_time;

	function __construct($request)
	{
		header("Content-Type: application/json");
		$this->request = urldecode($request);
		$this->api_limit = 150; //150 tweets 
		$this->api_per = 3600; // per 1 hour
		$this->cache_store = "cache/";
		$this->cache_file = $this->cache_store."cachefile.php";
		$this->counter = $this->cache_store."/counter.php";
		if (!file_exists($this->cache_file)) { 
			mkdir($this->cache_store,0777);
			$this->start_counter();
		}
		else {
			$this->get_counter();
			if (time() >= $this->timer + $this->api_per)
			{
				$this->start_counter();
			}
		}
		
		$this->get_tweets();
	}
	
	function get_counter() {
		$worker = explode(":",file_get_contents($this->counter));
		$this->timer = $worker[0];
		$this->count = $worker[1];
	}
	
	function build_cache() 
	{
		file_put_contents($this->cache_file,$this->tweets);
	}
	
	function start_counter() 
	{
		$this->timer = time();
		$this->count = (int)0;
		$timer_string = $this->timer . ":" . $this->count;
		file_put_contents($this->counter,$timer_string);
		
	}
	
	function get_tweets() 
	{
		$use_cache = ($this->count >= $this->api_limit);
		if (!$use_cache)
		{
			$this->add_counter();
			$this->tweets = $this->do_request("new");
		}
		else {
			$this->tweets = $this->do_request("cache");
		}
		$this->build_cache();
		echo $this->tweets;
	}
	
	function add_counter() {
		$this->count++;
		$timer_string = $this->timer . ":" . $this->count;
		file_put_contents($this->counter,$timer_string);
	}
	
	function do_request($type) 
	{
		if (!isset($this->retries)) { $this->retries = 5; }
		if ($type == "new")
		{
			$url = $this->request;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			$tweets = curl_exec($ch);
			$httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			if ($httpCode == 200)
			{
				return $tweets;
			}
			else 
			{
				if ($httpCode == 420)
				{
					$tweets = $this->do_request("cache");
					return $tweets;
				}
				else {
					if ($this->retries > 0)
					{
					$this->retries--;
					$this->add_counter();
					$tweets = $this->do_request("new");
					}
					else
					{
						$tweets = $this->do_request("cache");
					}
				}
			}
		}
		else {
			$tweets = file_get_contents($this->cache_file);
		}
		return $tweets;
	}
}

$url = "https://api.twitter.com/1/statuses/user_timeline.json?include_entities=1&screen_name=Twitter&count=5";
$t = new WSWP_Twitter_Client($_POST['request']);


