<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const FIRST_NUMBER_COLUMN = 'first_number';

    public const SECOND_NUMBER_COLUMN = 'second_number';

    public const OPERATOR_COLUMN = 'operator';

    public const RESULT_COLUMN = 'result';

    public function getFirstNumber(): float
    {
        return $this->getAttribute(self::FIRST_NUMBER_COLUMN);
    }

    public function getSecondNumber(): float
    {
        return $this->getAttribute(self::SECOND_NUMBER_COLUMN);
    }

    public function getOperator(): string
    {
        return $this->getAttribute(self::OPERATOR_COLUMN);
    }

    public function getResult(): float
    {
        return $this->getAttribute(self::RESULT_COLUMN);
    }
}
