<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use function Hyperf\Support\env;

return [
    'uri' => env('ETCD_URI', 'http://127.0.0.1:2379'),
    'version' => 'v3beta',
    'options' => [
        'timeout' => 10,
    ],
];
