<?php

namespace App\Providers;

use App\Events\AdoptionApplicationApproved;
use App\Events\AdoptionApplicationCreated;
use App\Events\FostererApplicationApproved;
use App\Events\FostererApplicationCreated;
use App\Events\FostererApplicationRejected;
use App\Events\HomeCheckAssessmentStored;
use App\Events\HomeCheckAssigned;
use App\Events\VetterApplicationApproved;
use App\Events\VetterApplicationCreated;
use App\Events\VetterApplicationRejected;
use App\Listeners\GrantRoleAfterFostererApplicationApproved;
use App\Listeners\GrantRoleAfterVetterApplicationApproved;
use App\Listeners\SendAdoptionApplicationApproveNotification;
use App\Listeners\SendFostererApplicationApproveNotification;
use App\Listeners\SendFostererApplicationCreateNotification;
use App\Listeners\SendFostererApplicationRejectNotification;
use App\Listeners\SendNewAdoptionApplicationNotification;
use App\Listeners\SendVetterApplicationApproveNotification;
use App\Listeners\SendVetterApplicationCreateNotification;
use App\Listeners\SendVetterApplicationRejectNotification;
use App\Listeners\SetApplicationStatusAfterHomeCheckAssessment;
use App\Listeners\SetApplicationStatusAfterHomeCheckAssigned;
use App\Models\User;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AdoptionApplicationCreated::class => [
            SendNewAdoptionApplicationNotification::class
        ],
        FostererApplicationCreated::class => [
            SendFostererApplicationCreateNotification::class
        ],
        FostererApplicationApproved::class => [
            GrantRoleAfterFostererApplicationApproved::class,
            SendFostererApplicationApproveNotification::class,
        ],
        FostererApplicationRejected::class => [
            SendFostererApplicationRejectNotification::class
        ],
        VetterApplicationCreated::class => [
            SendVetterApplicationCreateNotification::class
        ],
        VetterApplicationApproved::class => [
            GrantRoleAfterVetterApplicationApproved::class,
            SendVetterApplicationApproveNotification::class,
        ],
        VetterApplicationRejected::class => [
            SendVetterApplicationRejectNotification::class],
        HomeCheckAssigned::class => [
            SetApplicationStatusAfterHomeCheckAssigned::class
        ],
        HomeCheckAssessmentStored::class => [
            SetApplicationStatusAfterHomeCheckAssessment::class
        ],
        //Forget to import the Classes
        AdoptionApplicationApproved::class => [
            SendAdoptionApplicationApproveNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
    }
}
