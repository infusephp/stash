<?php

namespace App\Stash;

use Stash\Pool;

class Controller
{
    use \InjectApp;

    public function middleware($req, $res)
    {
        $config = $this->app['config'];

        $this->app['stash_driver'] = function () use ($config) {
            $driverClass = $config->get('cache.driver');
            if (!$driverClass) {
                $driverClass = 'Stash\Driver\Ephemeral';
            }

            $opts = (array) $config->get('cache.options');
            $driver = new $driverClass($opts);

            return $driver;
        };

        $this->app['stash'] = function ($c) use ($config) {
            $pool = new Pool($c['stash_driver']);
            $pool->setLogger($c['logger']);
            $pool->setNamespace($config->get('cache.namespace'));

            return $pool;
        };
    }
}
