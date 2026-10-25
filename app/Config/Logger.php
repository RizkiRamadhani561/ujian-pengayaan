<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;

/**
 * Logger configuration.
 *
 * Log files are written to writable/logs so dashboard errors can be
 * inspected locally without exposing exception details to end users.
 */
class Logger extends BaseConfig
{
    /**
     * 0 = no logging, 4 = all messages.
     */
    public int $threshold = 4;

    public array $dateFormat = [
        'date' => 'Y-m-d H:i:s',
    ];

    public array $handlers = [
        FileHandler::class => [
            'handles'         => [
                'critical',
                'alert',
                'emergency',
                'debug',
                'error',
                'info',
                'notice',
                'warning',
            ],
            'fileExtension'   => '',
            'filePermissions' => 0644,
            'path'            => WRITEPATH . 'logs',
        ],
    ];
}
