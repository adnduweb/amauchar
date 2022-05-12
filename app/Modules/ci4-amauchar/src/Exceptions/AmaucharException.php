<?php

/**
 * This file is part of Bonfire.
 *
 * (c) Lonnie Ezell <lonnieje@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Amauchar\Core\Exceptions;

use Exception;

final class AmaucharException extends Exception
{
    public static function forCollectionNotFound()
    {
        return new self(lang('Core.resourceNotFound', ['users']));
    }

    public static function forNotAuthorized()
    {
        return new self(lang('Core.notAuthorized'));
    }

    public static function forInvalidCollection()
    {
        return new self(lang('Core.invalidCollection'));
    }

    public static function forInvalidPage()
    {
        return new self(lang('Core.invalidPage'));
    }
}
