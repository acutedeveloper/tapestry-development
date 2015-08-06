<?php
    /*
    Plugin Name: Tapestry Feeds
    Plugin URI: www.acumendesign.co.uk
    Description: Plugin for the facebook and twitter feeds
    Author: NM Peters
    Version: 1.0
    Author URI: @acute_designer
    */


//------ TRUNCATE FUNCTION ------//


function myTruncate($string, $limit, $break=".", $pad="...")
{
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

//------ TWITTER FEED ------//

// http://jonathannicol.com/blog/2013/06/20/tweetphp-display-tweets-on-your-website-using-php/

require_once('includes/twitter/TweetPHP.php');

function tap_twitter_feed(){

	$TweetPHP = new TweetPHP(array(
	  'consumer_key'              => 'hAsxS7FEN9smQDWeV6OryRVq5',
	  'consumer_secret'           => 'mZidJX9t5kGwht56c0iblQSrTjWVsA0685QKFPMxAXxiWTHA6f',
	  'access_token'              => '263650827-N1HVtIfAIur0HlJ5hy0hgQ7HxcsuicMiVtOtVnhs',
	  'access_token_secret'       => 'kl1MY7StYPGwUxMcBTzwfMuw1B8BQxn5zn8mYEBLc9euD',
	  'twitter_screen_name'       => 'TapestryCare'
	));

	echo $TweetPHP->get_tweet_list();
}


//------ FACEBOOK FEED ------//

// http://callmenick.com/2013/03/14/displaying-a-custom-facebook-page-feed/

include('includes/facebook/facebook.php');

function tap_facebook_feed(){

    $cachetime = 60*60; // Seconds to cache files for
	$cachefile = dirname(__FILE__) . '/includes/facebook/cache/fb.txt';

	// connect to app
	$config = array();
	$config['appId'] = '388799311278680';
	$config['secret'] = 'a1a55787f17d6b2562799f93434fbab4';
	$config['fileUpload'] = false; // optional



	$cache_file_timestamp = ((file_exists($cachefile))) ? filemtime($cachefile) : 0;

	// Show file from cache if still valid.
	if (time() - $cachetime < $cache_file_timestamp)
	{
		$cachedfeed = file_get_contents($cachefile);
		echo $cachedfeed;
	}
	else
	{
		$html = '';

		// instantiate

		$facebook = new Facebook($config);

		// set page id
		$pageid = "105085226191512";

		// now we can access various parts of the graph, starting with the feed
		$pagefeed = $facebook->api("/" . $pageid . "/feed");

		$html .= "<h4 class=\"fb\">Tapestry on Facebook</h4>";

		// set counter to 0, because we only want to display 10 posts
		$i = 0;
		foreach($pagefeed['data'] as $post) {

		    if ($post['type'] == 'status' || $post['type'] == 'link' || $post['type'] == 'photo')
		    {
		            // check if post type is a status
		            if ($post['type'] == 'status') {
		                $html .= "<p>" . myTruncate($post['message'], 75) . "</p>";
		            }

		            // check if post type is a link
		            if ($post['type'] == 'link') {
		                $html .= "<p>" . myTruncate($post['message'], 75) . " ";
		                $html .= "<a href=\"" . $post['link'] . "\" target=\"_blank\">" . "Read More" . "</a></p>";
		            }

		            // check if post type is a photo
		            if ($post['type'] == 'photo') {
		                if (empty($post['story']) === false) {
		                    $html .= "<p>" . $post['story'] . " ";
		                } elseif (empty($post['message']) === false) {
		                    $html .= "<p>" . myTruncate($post['message'], 75) . " ";
		                }
		                $html .= "<a href=\"" . $post['link'] . "\" target=\"_blank\">View photo &rarr;</a></p>";
		            }

		        $i++; // add 1 to the counter if our condition for $post['type'] is met
		    }

		    //  break out of the loop if counter has reached 3
		    if ($i == 3) {
		        break;
		    }
		} // end the foreach statement

        // Save the formatted tweet list to a file.
        $file = fopen($cachefile, 'w');
        fwrite($file, $html);
        fclose($file);

        echo $html;

	}

}
