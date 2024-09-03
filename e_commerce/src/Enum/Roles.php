<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

/**
 * @method static Roles CLIENT()
 * @method static Roles ADMINISTRATOR()
 */

 class Roles extends Enum {
    private const CLIENT = 'Client';
    private const ADMINISTRATOR = 'Administrator';
 }
