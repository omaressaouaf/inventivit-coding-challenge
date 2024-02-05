<?php

namespace App\Http\Controllers\Calculator;

use App\Core\Domain\Exceptions\CannotDivideByZeroException;
use App\Core\Domain\Exceptions\InvalidCalculationOperatorException;
use App\Core\Domain\Services\CalculatorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Calculator\CalculateRequest;
use App\Models\Calculation;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Throwable;

class CalculateController extends Controller
{
    public function __invoke(CalculateRequest $request)
    {
        try {
            $calculation = CalculatorService::compute(
                $request->get(Calculation::FIRST_NUMBER_COLUMN),
                $request->get(Calculation::SECOND_NUMBER_COLUMN),
                $request->get(Calculation::OPERATOR_COLUMN)
            );

            return response()->json([
                'calculation' => $calculation,
            ], Response::HTTP_CREATED);
        } catch (InvalidCalculationOperatorException $e) {
            throw ValidationException::withMessages([
                Calculation::OPERATOR_COLUMN => $e->getMessage(),
            ]);
        } catch (CannotDivideByZeroException $e) {
            throw ValidationException::withMessages([
                Calculation::SECOND_NUMBER_COLUMN => $e->getMessage(),
            ]);
        } catch (Throwable $e) {
            report($e);

            return response()->json([
                'error' => 'Unknown error occured',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
