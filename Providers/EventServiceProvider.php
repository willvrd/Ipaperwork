<?php

namespace Modules\Ipaperwork\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

use Modules\Ipaperwork\Events\UserPaperworkWasCreated;
use Modules\Ipaperwork\Events\Handlers\UserPaperworkSend;
use Modules\Ipaperwork\Events\Handlers\UserPaperworkUploadFile;

use Modules\Ipaperwork\Events\UserPaperworkHistoryWasCreated;
use Modules\Ipaperwork\Events\Handlers\UserPaperworkHistorySend;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
    
        UserPaperworkWasCreated::class => [
            UserPaperworkUploadFile::class,
            UserPaperworkSend::class
        ],

        UserPaperworkHistoryWasCreated::class => [
            UserPaperworkHistorySend::class
        ],

    ];
}
