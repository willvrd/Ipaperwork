<?php

namespace Modules\Ipaperwork\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Modules\Ipaperwork\Events\UserPaperworkWasCreated;
use Modules\Ipaperwork\Events\Handlers\UserPaperworkSend;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
    
        UserPaperworkWasCreated::class => [
            UserPaperworkSend::class
        ],

    ];
}
