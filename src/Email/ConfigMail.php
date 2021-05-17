<?php

namespace App\Email;

use App\Env\EmailEnv;
use Swift_SmtpTransport;

/**
 * Class ConfigMail
 * @package App\Email
 */
class ConfigMail extends EmailEnv
{
    /**
     * @return \Swift_SmtpTransport
     */
    private function transporter() {
        return (new Swift_SmtpTransport($this->smtp, $this->port))
            ->setUsername($this->username)
            ->setPassword($this->password)
            ;
    }

    /**
     * mailer()
     * --------
     * ⚠ Create a message:
     *  - $message = (new Swift_Message('Wonderful Subject'))
     *          ->setFrom(['john@doe.com' => 'John Doe'])
     *          ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
     *          ->setBody('Here is the message itself')
     *      ;
     *
     * ⚠ Send the message
     * - $result = $sender->mailer()->send($message);
     * @return \Swift_Mailer
     */
    public function mailer() {
        return new \Swift_Mailer($this->transporter());
    }

}