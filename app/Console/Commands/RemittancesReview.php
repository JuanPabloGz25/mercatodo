<?php

namespace App\Console\Commands;

use App\Jobs\RemittancesReviewJob;
use App\Models\Remittances\Remittance;
use Illuminate\Console\Command;

class RemittancesReview extends Command
{
    protected $signature = 'remittance:review';

    protected $description = 'Command description';

    public function handle()
    {
        $remittances = Remittance::where('status', 'pending')->get();
        foreach ($remittances as $remittance)
        {
            dispatch(new RemittancesReviewJob($remittance));
        }
    }
}
