<?php

class Dweet
{
  function __construct() {
    $this->redis = Redis::connection();
    $this->expire = 86400;
    $this->no_dweets_found = array("No dweets found." => "true");
  }
  
  public function getLast($thing) {
    $length = $this->getLength($thing);
    if($length > 0) {
      $dweet_id = $this->redis->lrange($thing, 0, 0);
      $dweet = $this->get($dweet_id[0]);
      return $dweet;
    } else {
      return $this->no_dweets_found;
    }
  }
  
  public function getAll($thing) {
    $length = $this->getLength($thing);
    if($length > 0) {
      $dweet_ids = $this->redis->lrange($thing, 0, $length-1);
      $dweets = $this->processDweets($dweet_ids);
      return $dweets;
    } else {
      return $this->no_dweets_found;
    }
  }
  
  private function processDweets($ids) {
    $dweet_content = array();
    foreach ($ids as $id) {
      $dweet_content[] = $this->get($id);
    }
    return $dweet_content;
  }
  
  private function getLength($thing) {
    return $length = $this->redis->llen($thing);
  }
  
  public function get($dweet) {
    $content = $this->redis->get($dweet);
    return json_decode($content);
  }
  
  public function add($dweet) {
    // Save the dweet.
    $dweet_id = $this->redis->incr('dweets');
    $this->redis->set($dweet_id, json_encode($dweet));
    $this->redis->expire($dweet_id, $this->expire);
    // Save in the $thing set.
    $thing = $dweet['with']['thing'];
    $this->redis->lpush($thing, $dweet_id);
    $this->redis->expire($thing, $this->expire);
  }
}
?>