<?php

namespace Modules\Ipaperwork\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
//use Modules\Ipaperwork\Emails\UserPaperwork;

class UserPaperworkSend
{
   
    /**
     * @var Mailer
     */
    private $mail;
    private $setting;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
        $this->setting = app('Modules\Setting\Contracts\Setting');
    }

    public function handle($event)
    {

        dd("Ejecuta evento");

    }

    

}
