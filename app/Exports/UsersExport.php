<?php

namespace App\Exports;

use App\Models\Users\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;


class UsersExport implements FromQuery, ShouldQueue
{
    use Exportable;
    private ?string $gender;
    private string $startDate;
    private string $endDate;

    public function forGender(string $gender=null)
    {
        $this->gender = $gender;

        return $this;
    }

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
        return User::when($this->gender, function ($query) {
            $query->where('gender', $this->gender);
        })->whereBetween('created_at',[$this->startDate,$this->endDate]);
    }
}
