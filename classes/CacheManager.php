<?php

namespace App\Classes;

use App\Interfaces\CacheManagerAdapter;

class CacheManager implements CacheManagerAdapter {

    private Cache $cache;

    public function __construct(Cache $cache) {
      $this->cache = $cache;
    }

    public function retrieve($key) {
      return $this->cache->get($key);
    }

    public function store(...$args){ 
          $params = func_get_args();
          $this->cache->set($params);
    } 

    public function config(string $host,string $port, string $type){
      $this->cache->setHost($host);
      $this->cache->setPort($port);
      $this->cache->setCache();
    }

    public function connect(){
        $this->cache->connect(); 
    }  

}

