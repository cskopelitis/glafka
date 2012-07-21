<?php
namespace security;

use redis\RedisHashSet;
require_once 'redis/RedisHashSet.php';
use notification;
require_once 'notification/model/Channel.php';

/*
 * The basic user entity
*
* properties:
* 0. (inherited) user id
* 1. username
* 2. password
* 3. firstname
* 4. lastname
* 5. role (contrains permissions)
* 6. groups
*/
class User extends RedisHashSet {

  public function __construct($id){
    parent::__construct($id);
  }

  public function getIdPrefix() {
    return '';
  }

  public function addChannelId($channelId){
    $channelIds=$this->channelIds;
    if($channelIds==null){
      $this->channelIds=$channelId;
    }
    else{
      $this->channelIds=$channelIds . ',' . $channelId;
    }
  }

  public function setPassword($password) {
    $this->password=md5($password);
  }

  public function getChannels() {
    $channelIds=$this->channelIds;
    if($channelIds==null){
      return array();
    }

    $channels=array();
    foreach(split(',', $channelIds) as $channelId){
      $channels[$channelId]=new Channel($channelId);
    }
    return $channels;
  }

  public static function initDb() {
    $tmpUser=new User('cskopelitis');
    $tmpUser->setPassword('1');
    $tmpUser->addChannelId(1);
    $tmpUser->addChannelId(2);

    $tmpUser=new User('guest');
    $tmpUser->setPassword('guest');

  }
}