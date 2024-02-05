<?php

namespace App\Core\Domain\Services;

use App\Core\Domain\Exceptions\CannotDivideByZeroException;
use App\Core\Domain\Exceptions\InvalidCalculationOperatorException;
use App\Core\Repositories\Contracts\CalculationRepository;
use App\Models\Calculation;

class CalculatorService
{
    public const ADD_OPERATOR = '+';

    public const SUBSTRACT_OPERATOR = '-';

    public const MULTIPLY_OPERATOR = '*';

    public const DEVIDE_OPERATOR = '/';

    public const ALL_OPERATORS = [
        self::ADD_OPERATOR,
        self::SUBSTRACT_OPERATOR,
        self::MULTIPLY_OPERATOR,
        self::DEVIDE_OPERATOR,
    ];

    public const ALL_OPERATORS_MAPPING = [
        self::ADD_OPERATOR => 'add',
        self::SUBSTRACT_OPERATOR => 'subtract',
        self::MULTIPLY_OPERATOR => 'multiply',
        self::DEVIDE_OPERATOR => 'divide',
    ];

    private CalculationRepository $calculationRepository;

    private float $result;

    public function __construct(float $firstNumber = 0)
    {
        $this->calculationRepository = app(CalculationRepository::class);

        $this->result = $firstNumber;
    }

    public static function compute(float $firstNumber, float $secondNumber, string $operator): Calculation
    {
        if (! in_array($operator, self::ALL_OPERATORS)) {
            throw new InvalidCalculationOperatorException();
        }

        $calculatorInstance = new self($firstNumber);

        $operateMethod = self::ALL_OPERATORS_MAPPING[$operator];

        $result = $calculatorInstance->{$operateMethod}($secondNumber)->getResult();

        $calculation = $calculatorInstance->calculationRepository->createCalculation([
            Calculation::FIRST_NUMBER_COLUMN => $firstNumber,
            Calculation::SECOND_NUMBER_COLUMN => $secondNumber,
            Calculation::OPERATOR_COLUMN => $operator,
            Calculation::RESULT_COLUMN => $result,
        ]);

        return $calculation;
    }

    private function add(float $value): self
    {
        $this->result += $value;

        return $this;
    }

    private function subtract(float $value): self
    {
        $this->result -= $value;

        return $this;
    }

    private function multiply(float $value): self
    {
        $this->result *= $value;

        return $this;
    }

    private function divide(float $value): self
    {
        if ($value == 0) {
            throw new CannotDivideByZeroException();
        }

        $this->result /= $value;

        return $this;
    }

    public function getResult(): float
    {
        return $this->result;
    }
}
