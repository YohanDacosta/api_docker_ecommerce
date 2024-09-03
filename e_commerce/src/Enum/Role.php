<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static Role CLIENT()
 * @method static Role ADMINISTRATOR()
 */

 class Role extends Enum {
    private const CLIENT = 'Client';
    private const ADMINISTRATOR = 'Administrator';
 }
