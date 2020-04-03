<?php

namespace Modules\Ipaperwork\Events;

use Modules\Ipaperwork\Entities\UserPaperworkHistory;

class UserPaperworkHistoryWasCreated
{
    public $uphistory;
    public $data;

    public function __construct(UserPaperworkHistory $uphistory,array $data)
    {
        $this->uphistory = $uphistory;
        $this->data = $data;
    }

}