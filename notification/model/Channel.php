<?php
namespace notification;

use redis\RedisHashSet;
require_once 'redis/RedisHashSet.php';

class Channel extends RedisHashSet {

  //   private $name;

  public function __construct($id){
    parent::__construct($id);
  }

  public function getIdPrefix() {
    return 'ch';
  }

  public static function initDb(){
    $channel=new Channel(1);
    $channel->name='Forum Channel';
    $channel=new Channel(2);
    $channel->name='Library Channel';
  }
}
?>