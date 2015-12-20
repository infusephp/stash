stash
===============

[![Build Status](https://travis-ci.org/infusephp/stash.png?branch=master)](https://travis-ci.org/infusephp/stash)
[![Coverage Status](https://coveralls.io/repos/infusephp/stash/badge.png)](https://coveralls.io/r/infusephp/stash)
[![Latest Stable Version](https://poser.pugx.org/infuse/stash/v/stable.png)](https://packagist.org/packages/infuse/stash)
[![Total Downloads](https://poser.pugx.org/infuse/stash/downloads.png)](https://packagist.org/packages/infuse/stash)
[![HHVM Status](http://hhvm.h4cc.de/badge/infuse/stash.svg)](http://hhvm.h4cc.de/package/infuse/stash)

Mailer module for Infuse Framework

## Installation

Install the package with [composer](http://getcomposer.org):

```
composer require infuse/stash
```

## Configuration

Add this to your `config.php`:

```php
'cache' => [
	'namespace' => 'namespace',
	'driver' => 'Stash\\Driver\\Predis',
	'options' => [
		'scheme' => 'tcp',
		'host' => '127.0.0.1',
		'port' => 6379
	]
]
```

Add the services to your app's configuration:

```php
'services' => [
	// ...
	'stash' => 'App\Stash\Stash',
	'stash_driver' => 'App\Stash\StashDriver'
	// ...
]
```