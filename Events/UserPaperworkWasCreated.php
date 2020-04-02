<?php

namespace Modules\Ipaperwork\Events;

use Modules\Ipaperwork\Entities\UserPaperwork;

class UserPaperworkWasCreated
{
    public $userpaperwork;
    public $data;

    public function __construct(UserPaperwork $userpaperwork,array $data)
    {
        $this->userpaperwork = $userpaperwork;
        $this->data = $data;
    }

}