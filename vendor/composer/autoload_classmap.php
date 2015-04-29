<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'BaseController' => $baseDir . '/app/controllers/BaseController.php',
    'DatabaseSeeder' => $baseDir . '/app/database/seeds/DatabaseSeeder.php',
    'EmbedController' => $baseDir . '/app/controllers/EmbedController.php',
    'IlluminateQueueClosure' => $vendorDir . '/laravel/framework/src/Illuminate/Queue/IlluminateQueueClosure.php',
    'IndexController' => $baseDir . '/app/controllers/IndexController.php',
    'LoginController' => $baseDir . '/app/controllers/LoginController.php',
    'PanelController' => $baseDir . '/app/controllers/PanelController.php',
    'SessionHandlerInterface' => $vendorDir . '/symfony/http-foundation/Symfony/Component/HttpFoundation/Resources/stubs/SessionHandlerInterface.php',
    'TestCase' => $baseDir . '/app/tests/TestCase.php',
    'User' => $baseDir . '/app/models/User.php',
    'Whoops\\Module' => $vendorDir . '/filp/whoops/src/deprecated/Zend/Module.php',
    'Whoops\\Provider\\Zend\\ExceptionStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/ExceptionStrategy.php',
    'Whoops\\Provider\\Zend\\RouteNotFoundStrategy' => $vendorDir . '/filp/whoops/src/deprecated/Zend/RouteNotFoundStrategy.php',
    'mcservers' => $baseDir . '/app/libraries/mcservers.php',
    'settings' => $baseDir . '/app/libraries/settings.php',
    'time' => $baseDir . '/app/libraries/time.php',
    'utilities' => $baseDir . '/app/libraries/utilities.php',
    'xPaw\\MinecraftPing' => $baseDir . '/app/libraries/MinecraftPing.php',
    'xPaw\\MinecraftPingException' => $baseDir . '/app/libraries/MinecraftPingException.php',
    'xPaw\\MinecraftQuery' => $baseDir . '/app/libraries/MinecraftQuery.php',
    'xPaw\\MinecraftQueryException' => $baseDir . '/app/libraries/MinecraftQueryException.php',
);
