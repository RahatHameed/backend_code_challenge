<?php

use App\Classes\RedisCache;
use App\Classes\MemcacheCache;
use App\Classes\CacheManager;

$redisCache=new RedisCache();
$redisCache->setHost($_ENV["REDIS_HOST"]);
$redisCache->setPort($_ENV["REDIS_PORT"]);
$redisCache->connect();
$redisCache->set('one','1');
$redisCache->lpush('two','1');
$redisCache->lpush('two','2');
echo $redisCache->get('one');


$memcache=new MemcacheCache();
$memcache->setHost($_ENV["HOST"]);
$memcache->setPort($_ENV["MEMCACHE_PORT"]);
$redisCache->connect();
$memcache->set('one','1');
echo $cm->get('one');

/*
*This method will not be available on MemcacheCache as it does not implement lPushSupport interface
*/
//$memcache->lpush('two','2'); 

//using CacheManager/Adaptar

$rcm=new CacheManager($redisCache);
$rcm->store('one','1');
echo $rcm->retrieve('one');

$mcm=new CacheManager($memcache);
$mcm->store('one','1');
echo $mcm->retrieve('one');
