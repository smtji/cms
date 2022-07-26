<?php

declare(strict_types=1);

namespace app\libs\frontend;

use Api;

class IndexController
{
    public static function index()
    {
        //Api::fun()->sess(['id' => 'set', 'name' => 'logged_in', 'value' => 'no']);

        Api::render('index', [
            'data' => '前端',
        ]);
    }
}
