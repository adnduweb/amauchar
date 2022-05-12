<?php

namespace Amauchar\Core\Exceptions;

use Exception;

class UserAuthException extends Exception
{
    protected $code = 500;

    public static function forUnknownUser(string $user)
    {
        return new self(lang('Auth.unknownUser', [$user]));
    }

    public static function forUnknownPermission(string $permission)
    {
        return new self(lang('Auth.unknownPermission', [$permission]));
    }
}
