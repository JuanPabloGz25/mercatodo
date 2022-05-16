<?php

namespace App\Listeners;

use App\Events\NewVisited;
use App\Models\NewsVisit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddNewVisit
{
    public function handle(NewVisited $event): void
    {
        NewsVisit::create([
            'new_id'=> $event->news->getRouteKey(),
        ]);
    }
}
