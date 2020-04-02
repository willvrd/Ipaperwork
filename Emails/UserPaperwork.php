<?php

namespace Modules\Ipaperwork\Emails;

use Illuminate\Mail\Mailable;
use Modules\Ipaperwork\Repositories\UserPaperworkRepository;

class UserPaperwork extends Mailable
{
   
    public $userpaperwork;
    public $subject;
    public $view;

    public function __construct($userpaperwork,$subject,$view)
    {
        $this->userpaperwork = $userpaperwork;
        $this->subject = $subject;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->view($this->view)
            ->subject($this->subject);
    }
}
