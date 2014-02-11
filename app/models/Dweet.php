<?php

class Dweet
{
  function __construct() {
    $this->redis = Redis::connection();
    $this->expire = 86400;
  }
  
  public function getLast($thing) {
    
  }
  
  public function getAll($thing) {
    
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