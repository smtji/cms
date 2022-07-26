<?php
return [
    'index' => [
        ['GET /', 'frontend\Index:index'],
    ],
    'admin' => [
        ['GET /admin', 'backend\Index:index'],
    ],
];
