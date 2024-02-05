<?php

namespace App\Core\Domain\Exceptions;

use Exception;

class CannotDivideByZeroException extends Exception
{
    public function __construct(string $message = 'Cannot divide by zero')
    {
        parent::__construct($message);
    }
}
