<?php

use BankV3\App;

session_start();

define('URL', 'http://bankV3.test/');

require __DIR__ . '/../vendor/autoload.php';

echo App::start();