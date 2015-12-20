<?php

namespace App\Stash;

use Stash\Pool;

class Stash
{
    public function __invoke($app)
    {
        $pool = new Pool($app['stash_driver']);
        $pool->setLogger($app['logger']);
        $pool->setNamespace($app['config']->get('cache.namespace'));

        return $pool;
    }
}
