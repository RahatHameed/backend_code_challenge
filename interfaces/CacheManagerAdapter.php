<?php

namespace App\Interfaces;

interface CacheManagerAdapter
{
    /**
    * Connect with cache client
    */
    public function connect();

    /**
    * Retrieve cached data by its key
    */
    public function retrieve($key);

    /**
    * Store cached data
    */
    function store($args);
        

    /**
    * set cache config 
    */
    public function config(string $host,string $port, string $type);

}