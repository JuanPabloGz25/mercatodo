<?php

namespace App\Providers;

use App\Events\NewVisited;
use App\Listeners\AddNewVisit;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\News\News;
use App\Models\Users\User;
use App\Models\Products\Products;
use App\Models\Remittances\Remittance;
use App\Observers\ModelObserver;


class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        NewVisited::class => [
            AddNewVisit::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(ModelObserver::class);
        News::observe(ModelObserver::class);
        Products::observe(ModelObserver::class);
        Remittance::observe(ModelObserver::class);
    }
}
