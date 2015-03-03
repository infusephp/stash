<?php

namespace app\stash;

use infuse\Model;
use Stash\Pool;

class Controller
{
	use \InjectApp;

	function middleware($req, $res)
	{
		$config = $this->app['config'];
		
        $this->app['stash_driver'] = function () use ($config) {
            $driverClass = $config->get('cache.driver');
            if (!$driverClass) {
                $driverClass = '\\Stash\\Driver\\Ephemeral';
            }

            $driver = new $driverClass();
            $driver->setOptions((array) $config->get('cache.options'));

            return $driver;
        };

        $this->app['stash'] = function ($c) use ($config) {
            $pool = new Pool($c['stash_driver']);
            $pool->setLogger($c['logger']);
            $pool->setNamespace($config->get('cache.namespace'));

            return $pool;
        };

		Model::setDefaultCache($this->app['stash']);
	}
}