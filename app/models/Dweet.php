<?php

class Dweet
{
  function __construct() {
    $this->redis = Redis::connection();
    $this->expire = 86400;
    $this->no_dweet_found = array("No dweet found." => "true");
  }
  
  public function getLast($thing) {
    $length = $this->redis->llen($thing);
    if($length > 0) {
      $dweet_id = $this->redis->lrange($thing, 0, 0);
      $dweet = $this->get($dweet_id[0]);
      return $dweet;
    } else {
      return $this->no_dweet_found;
    }
  }
  
  public function getAll($thing) {
    
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