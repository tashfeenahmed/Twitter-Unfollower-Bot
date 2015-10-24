<?php

require_once('twitteroauth/twitteroauth.php');

class TwitterBot
{
	protected $oauth;

	public function __construct($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret)
	{
		$this->oauth = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
	}
	public function autoUnfollow()
	{
		$followers = $this->oauth->get('followers/ids', array('cursor' => -1));
		$friends = $this->oauth->get('friends/ids', array('cursor' => -1));

		foreach ($friends->ids as $i => $id) {
			if (empty($followers->ids) or !in_array($id, $followers->ids)) {
				$this->oauth->post('friendships/destroy', array('user_id' => $id));
			}
		}
	}

}
