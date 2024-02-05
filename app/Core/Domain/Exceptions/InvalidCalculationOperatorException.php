<?php

namespace App\Core\Domain\Exceptions;

use Exception;

class InvalidCalculationOperatorException extends Exception
{
    public function __construct(string $message = 'Invalid calculation operator')
    {
        parent::__construct($message);
    }
}
