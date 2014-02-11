<?php

class Dweet
{
  function __construct() {
    $this->redis = Redis::connection();
  }
  
  public function getLast($thing) {
    
  }
  
  public function getAll($thing) {
    
  }
  
  public function add($dweet) {
    $thing = $dweet['with']['thing'];
    $time = $dweet['with']['created'];
    $key = $thing . ":" . $time;
    $this->redis->set("$key", json_encode($dweet));
    $this->redis->expire("$key", 86400);
  }
}
?>