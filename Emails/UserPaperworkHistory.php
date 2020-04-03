<?php

namespace Modules\Ipaperwork\Emails;

use Illuminate\Mail\Mailable;
use Modules\Ipaperwork\Repositories\UserPaperworkHistoryRepository;

class UserPaperworkHistory extends Mailable
{
   
    public $uphistory;
    public $subject;
    public $view;

    public function __construct($uphistory,$subject,$view)
    {
        $this->uphistory = $uphistory;
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
