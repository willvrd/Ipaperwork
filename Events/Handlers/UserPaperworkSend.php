<?php

namespace Modules\Ipaperwork\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
use Modules\Ipaperwork\Emails\UserPaperwork;

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

        $userpaperwork = $event->userpaperwork;
        $data = $event->data;
        
        $subject = trans("ipaperwork::common.email.subject")." ".$userpaperwork->present()->status." #".$userpaperwork->id;
        $view = "ipaperwork::emails.UserPaperwork";
            
        // Send Admin
        $email_to = explode(',',$this->setting->get('ipaperwork::form-emails'));

        $this->mail->to($email_to[0])->send(new UserPaperwork($userpaperwork,$subject,$view));
        

    }

    

}
