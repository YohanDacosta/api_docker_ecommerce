<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static Status PENDING()
 * @method static Status SENDED()
 * @method static Status DELIVERED()
 * @method static Status CANCELED()
 */
class Status extends Enum {
    private const PENDING = 'Pending';
    private const SENDED = 'Sended';
    private const DELIVERED = 'Delivered';
    private const CANCELED = 'Canceled';
}