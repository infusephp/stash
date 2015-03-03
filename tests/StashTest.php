<?php

use app\stash\Controller;

class StashTest extends \PHPUnit_Framework_TestCase
{
    public function testStash()
    {
        $app = new App([
            'cache' => [
                'namespace' => 'namespace']]);

        $controller = new Controller;
        $controller->injectApp($app);
        $controller->middleware($app['req'], $app['res']);

        $stash = $app['stash'];
        $this->assertInstanceOf('\\Stash\\Pool', $stash);
        $this->assertEquals('namespace', $stash->getNamespace());
        $this->assertInstanceOf('\\Stash\\Driver\\Ephemeral', $app['stash_driver']);
    }
}
