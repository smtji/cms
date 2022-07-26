<?php

declare(strict_types=1);

use app\core\Loader;
use app\core\Dispatcher;
use app\Engine;
use app\net\Request;
use app\net\Response;
use app\net\Router;
use app\out\View;

class Api
{
    /**
     * Framework engine.
     */
    private static Engine $engine;

    // Don't allow object instantiation
    private function __construct() { }

    private function __destruct() { }

    private function __clone() { }

    /**
     * Handles calls to static methods.
     *
     * @param string $name   Method name
     * @param array  $params Method parameters
     *
     * @throws Exception
     *
     * @return mixed Callback results
     */
    public static function __callStatic(string $name, array $params)
    {
        $instantiate = self::instantiate();

        return Dispatcher::invokeMethod([$instantiate, $name], $params);
    }

    /**
     * @return Engine Application instance
     */
    public static function instantiate(): Engine
    {
        static $initialized = false;

        if (!$initialized) {
            require_once __DIR__ . '/core/Loader.php';

            Loader::autoload(true, [dirname(__DIR__)]);

            self::$engine = new Engine();

            $initialized = true;
        }

        return self::$engine;
    }
}
