<?php

defined('SYSPATH') or die('No direct script access.');

//Load Zend's Autoloader
if ($path = Kohana::find_file('vendor', 'zend/library/Zend/Loader/AutoloaderFactory'))
{
	include $path;

	Zend\Loader\AutoloaderFactory::factory(array(
	    'Zend\Loader\StandardAutoloader' => array(
		'autoregister_zf' => true,
		'namespaces' => array(
		    __NAMESPACE__ => __DIR__.'/'.__NAMESPACE__,
		),
	    ),
	));
}