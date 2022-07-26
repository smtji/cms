<?php

declare(strict_types=1);

namespace app\libs\backend;

use Api;

class IndexController
{
    public static function index()
    {
        Api::render('admin/index', [
            'data' => '后端',
        ]);
    }
}
