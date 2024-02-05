<?php

namespace Tests\Feature;

use App\Core\Domain\Exceptions\CannotDivideByZeroException;
use App\Core\Domain\Exceptions\InvalidCalculationOperatorException;
use App\Core\Domain\Services\CalculatorService;
use App\Models\Calculation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class CalculatorTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_calculator_view_can_be_rendered(): void
    {
        $response = $this->get(route('calculator.show'));

        $response->assertOk();
    }

    public function test_calculation_can_be_saved(): void
    {
        $data = [
            Calculation::FIRST_NUMBER_COLUMN => 5,
            Calculation::SECOND_NUMBER_COLUMN => 2,
            Calculation::OPERATOR_COLUMN => '+',
        ];

        $response = $this->post(route('calculator.calculate'), $data);

        $response->assertCreated()->assertJson(fn (AssertableJson $json) => $json->has('calculation'));
        $this->assertDatabaseHas(Calculation::class, $data);
    }

    public function test_calculator_can_compute_results_correctly(): void
    {
        $calculations = [
            [
                Calculation::FIRST_NUMBER_COLUMN => 5,
                Calculation::SECOND_NUMBER_COLUMN => 2,
                Calculation::OPERATOR_COLUMN => '+',
            ],
            [
                Calculation::FIRST_NUMBER_COLUMN => 2,
                Calculation::SECOND_NUMBER_COLUMN => 5,
                Calculation::OPERATOR_COLUMN => '-',
            ],
            [
                Calculation::FIRST_NUMBER_COLUMN => 6,
                Calculation::SECOND_NUMBER_COLUMN => 2,
                Calculation::OPERATOR_COLUMN => '*',
            ],
            [
                Calculation::FIRST_NUMBER_COLUMN => 10,
                Calculation::SECOND_NUMBER_COLUMN => 3,
                Calculation::OPERATOR_COLUMN => '/',
            ],
        ];

        foreach ($calculations as $calculation) {
            $calculationAsModel = CalculatorService::compute(
                $calculation[Calculation::FIRST_NUMBER_COLUMN],
                $calculation[Calculation::SECOND_NUMBER_COLUMN],
                $calculation[Calculation::OPERATOR_COLUMN]
            );

            $expectedResult = eval(sprintf(
                'return %s %s %s;',
                (string) $calculation[Calculation::FIRST_NUMBER_COLUMN],
                $calculation[Calculation::OPERATOR_COLUMN],
                (string) $calculation[Calculation::SECOND_NUMBER_COLUMN],
            ));

            $this->assertEquals($expectedResult, $calculationAsModel->getResult());
        }
    }

    public function test_calculator_can_accept_only_valid_operators(): void
    {
        $this->assertThrows(function () {
            CalculatorService::compute(
                5,
                2,
                'random-operator'
            );
        }, InvalidCalculationOperatorException::class);
    }

    public function test_calculator_cannot_divide_by_zero(): void
    {
        $this->assertThrows(function () {
            CalculatorService::compute(
                5,
                0,
                CalculatorService::DEVIDE_OPERATOR
            );
        }, CannotDivideByZeroException::class);
    }
}
