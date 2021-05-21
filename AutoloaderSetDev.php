<?php
########## AUTOLOAD ###################################
require "../../Pes/Pes/src/Autoloader/Autoloader.php";

use Pes\Autoloader\Autoloader;

$pesAutoloader = new Autoloader();
$pesAutoloader->register();
$pesAutoloader->addNamespace('Pes', '../Pes/Pes/src/');
$pesAutoloader->addNamespace('Helper', 'Helper/');
$pesAutoloader->addNamespace('Model', 'Model/');
$pesAutoloader->addNamespace('Psr\Log', 'vendor/psr/log/Psr/Log/');
$pesAutoloader->addNamespace('Psr\Container', 'vendor/psr/container/src/'); //autoload pro namespace Ps

