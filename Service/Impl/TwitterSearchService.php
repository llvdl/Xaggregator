<?php

namespace Service\Impl;

use TwitterAPIExchange;
use \Simplon\Twitter\TwitterException;
use \Mapper\TwitterResultMapper;

class TwitterSearchService implements \Service\SocialSearchService {

    /** @var array */
    private $settings;

    public function __construct($oauth_access_token, $oath_access_token_secret, $consumer_key, $consumer_secret) {
        $this->settings = [
            'oauth_access_token' => $oauth_access_token,
            'oauth_access_token_secret' => $oath_access_token_secret,
            'consumer_key' => $consumer_key,
            'consumer_secret' => $consumer_secret
        ];
    }

    public function search($query) {
        try {
            $url = 'https://api.twitter.com/1.1/search/tweets.json';
            $getfield = '?q=' . urlencode($query);
            $requestMethod = 'GET';

            $twitter = new TwitterAPIExchange($this->settings);
            $response = $twitter->setGetfield($getfield)
                    ->buildOauth($url, $requestMethod)
                    ->performRequest();

            return $this->mapToSocialResults($response);
        } catch (TwitterException $e) {
            throw new SearchException("error executing twitter search", $e);
        }
    }

    private function mapToSocialResults($response) {
        $items = json_decode($response);
        $mapper = new TwitterResultMapper();
        return array_map(function($item) use($mapper) {
            return $mapper->mapToSocialResult($item);
        }, $items->statuses);
    }

}
