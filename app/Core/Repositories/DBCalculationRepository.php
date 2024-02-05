<?php

namespace App\Core\Repositories;

use App\Core\Repositories\Contracts\CalculationRepository;
use App\Models\Calculation;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class DBCalculationRepository implements CalculationRepository
{
    public function createCalculation(array $attributes): Calculation
    {
        /** @var Calculation */
        return Calculation::query()
            ->create([
                Calculation::FIRST_NUMBER_COLUMN => Arr::get($attributes, Calculation::FIRST_NUMBER_COLUMN),
                Calculation::SECOND_NUMBER_COLUMN => Arr::get($attributes, Calculation::SECOND_NUMBER_COLUMN),
                Calculation::OPERATOR_COLUMN => Arr::get($attributes, Calculation::OPERATOR_COLUMN),
                Calculation::RESULT_COLUMN => Arr::get($attributes, Calculation::RESULT_COLUMN),
            ]);
    }

    public function getAllCalculations(): Collection
    {
        return Calculation::query()->latest()->get();
    }
}
