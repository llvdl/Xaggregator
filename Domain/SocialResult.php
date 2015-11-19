<?php

namespace Domain;

class SocialResult {
    /** @var string */
    private $author;
    private $avatar;
    private $content;
    private $timestamp;
    
    public function __construct($author, $avatar, $content, $timestamp) {
        $this->author = $author;
        $this->avatar = $avatar;
        $this->content = $content;
        $this->timestamp = $timestamp;
    }
    
    public function getAuthor() {
        return $this->author;
    }
    
    public function getAvatar() {
        return $this->avatar;
    }
    
    public function getContent() {
        return $this->content;
    }
    
    public function getTimestamp() {
        return $this->timestamp;
    }
}
