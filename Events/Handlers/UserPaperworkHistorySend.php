<?php

namespace Modules\Ipaperwork\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
use Modules\Ipaperwork\Emails\UserPaperworkHistory;

class UserPaperworkHistorySend
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

       
        $uphistory = $event->uphistory;
        $data = $event->data;

        $subject = trans("ipaperwork::common.email.subject change")." ".$uphistory->present()->status." #".$uphistory->userPaperwork->id;
        $view = "ipaperwork::emails.UserPaperworkHistory";
            
        // Send Admin
        //$email_to = explode(',',$this->setting->get('ipaperwork::form-emails'));

        $this->mail->to($uphistory->userPaperwork->user->email)->send(new UserPaperworkHistory($uphistory,$subject,$view));
       

        dd("SIIII");

    }

    

}
