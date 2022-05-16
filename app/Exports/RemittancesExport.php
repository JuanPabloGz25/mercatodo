<?php

namespace App\Exports;

use App\Models\Remittances\Remittance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class RemittancesExport implements FromQuery, ShouldQueue
{
    use Exportable;
    private string $startDate;
    private string $endDate;

    public function forStartDate(string $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function forEndDate(string $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function query()
    {
        return Remittance::whereBetween('created_at',[$this->startDate,$this->endDate]);
    }
}
