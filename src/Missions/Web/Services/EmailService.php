<?php namespace Application\Missions\Web\Services;

use Application\Entity\Emailsender;
use Application\Entity\Student;

class EmailService
{

    /**
     * @param $registrants
     * @return void
     * @throws \Atomino\Carbon\ValidationError
     */
    public function create($registrants)
    {
        if ($registrants instanceof Student) {
            $dictionary = [
                '{{name}}' => $registrants->name,
                '{{site_url}}' => 'pollackexpo.mik.pte.hu',
                '{{qrcode}}' => $registrants->getQRCode(),
                '{{event}}' => 'PollackExpo 2023'
            ];

            $template = file_get_contents(__DIR__ . '/template/registration_email.html');
            $content = strtr($template, $dictionary);

            $email = Emailsender::create();
            $email->toName = $registrants->name;
            $email->toEmail = $registrants->email;
            $email->toQr = $registrants->getQRCode();
            $email->statusSent = false;
            $email->toContent = $content;
            $email->lang = $registrants->lang;
            $email->save();
        }
    }
}
