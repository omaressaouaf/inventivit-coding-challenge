<?php

namespace App\Http\Requests\Calculator;

use App\Core\Domain\Services\CalculatorService;
use App\Models\Calculation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalculateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            Calculation::FIRST_NUMBER_COLUMN => ['required', 'numeric'],
            Calculation::SECOND_NUMBER_COLUMN => ['required', 'numeric'],
            Calculation::OPERATOR_COLUMN => ['required', 'string', Rule::in(CalculatorService::ALL_OPERATORS)],
        ];
    }
}
