<?php
ini_set('display_errors', 1);
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "2875434706-yAQEx0jrda78F59jU115PGX6OxSjXh88lbUn8tZ",
    'oauth_access_token_secret' => "dhpXo7okgPXV5KfyOg8ntk7uA1zfrjqLRCZrSD8reHeAq",
    'consumer_key' => "c8OexSM7MVRihjrd7boAs0d9N",
    'consumer_secret' => "iTM79LWQCX8hISfQ0EW53DAgcBnQ14yD0KFQZfR7eUBMlPUO0v"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/blocks/create.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'usernameToBlock',
    'skip_status' => '1'
);

/** Perform a POST request and echo the response **/
//$twitter = new TwitterAPIExchange($settings);
//echo $twitter->buildOauth($url, $requestMethod)
          //   ->setPostfields($postfields)
          //   ->performRequest();

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=#maga&count=20';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);



$tweetData=json_decode($twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest(),$assoc=TRUE);


foreach($tweetData['statuses'] as $index => $items){

  $userArray = $items['user'];
  $mediaArray = $entitiesArray['media'];
  //$userArray = $items['description']


  echo "<"div class='tweet-div">  <a href ="http://twitter.com/' .$userArray['screen_name'] . "'><img class='twitter-pic' target='_blank' src='" . $userArray['profile_image_url'] . "'></a><a href="http:twitter.com/' . userArray['screen_name'] . '">' .userArray['name'] . '</a></br/>' . $items['text'];
  echo ;
  echo '<div class="twitter-tweet"> ' . $userArray['screen_name'] . $items['text'] . $;
  echo '<br/>' . $items['created_at'];
  echo '</div>';
  echo '<div class="twitter-pic"> ' . $userArray['default_profile_image: false'] . $items['picture'];
  echo '<br/>' . $items['created_at'];
  echo '</div>';
};



$twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
