<?php

namespace App\Http\Controllers\Calculator;

use App\Core\Repositories\Contracts\CalculationRepository;
use App\Http\Controllers\Controller;

class ShowCalculatorController extends Controller
{
    public function __construct(
        private CalculationRepository $calculationRepository,
    ) {
    }

    public function __invoke()
    {
        return view('calculator', [
            'calculations' => $this->calculationRepository->getAllCalculations(),
        ]);
    }
}
