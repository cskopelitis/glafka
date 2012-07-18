<?php
require_once '../redis/RedisHashSet.php';
require_once '../notification/model/Channel.php';

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
    parent::__construct('usr' . $id);
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

  public function setUsername($username){
    $this->username=$username;
    $this->redis->set($username,$this->getObjectId());
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
}
?>