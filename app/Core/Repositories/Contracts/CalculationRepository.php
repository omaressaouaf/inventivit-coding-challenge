<?php

namespace App\Core\Repositories\Contracts;

use App\Models\Calculation;
use Illuminate\Support\Collection;

interface CalculationRepository
{
    public function createCalculation(array $attributes): Calculation;

    public function getAllCalculations(): Collection;
}
