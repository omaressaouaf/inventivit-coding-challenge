<?php

namespace App\Core\Domain\Exceptions;

use Exception;

class InvalidCalculationOperatorException extends Exception
{
    public function __construct(string $message = "invalid calculation operator")
    {
        parent::__construct($message);
    }
}
