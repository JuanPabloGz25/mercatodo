<?php

namespace App\Exports;

use App\Models\Products\Products;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductsExport implements FromQuery, ShouldQueue
{
    use Exportable;
    private ?string $brand;
    private ?string $startDate;
    private ?string $endDate;

    public function forBrand(string $brand=null)
    {
        $this->brand = $brand;

        return $this;
    }

    public function forStartDate(string $startDate=null): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function forEndDate(string $endDate=null): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function query()
    {
        return Products::when($this->brand, function ($query) {
            $query->where('brand', $this->brand);
        })->when($this->startDate, function ($query) {
            $query->whereBetween('created_at', [$this->startDate, $this->endDate]);
        });
    }
}
