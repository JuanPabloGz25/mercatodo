<?php

namespace App\Jobs;

use App\Contracts\RemittanceGatewayContract;
use App\Models\Remittances\Remittance;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RemittancesReviewJob implements ShouldQueue
{
    protected Remittance $remittance;
    protected RemittanceGatewayContract $allocation;

    public function __construct(Remittance $remittance)
    {
        $this->remittance = $remittance;
        $this->allocation = resolve(RemittanceGatewayContract::class);
    }

    public function handle(): void
    {
        $this->allocation->queryPayment($this->remittance);
    }
}
