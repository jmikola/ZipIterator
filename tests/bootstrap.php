<?php

require_once __DIR__.'/../vendor/symfony/Component/ClassLoader/UniversalClassLoader.php';

$loader = new Symfony\Component\ClassLoader\UniversalClassLoader();
$loader->registerNamespace('ZipIterator\Tests', __DIR__);
$loader->registerNamespace('ZipIterator', __DIR__.'/../src');
$loader->register();
