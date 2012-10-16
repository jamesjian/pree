<?php
/**
 * it's for PHP 5.2 
 * same as App\Transaction\Swiftmail
 * without NAMESPACE
 */

class Swiftmail {

    /**
     *
     * @param Swift_Message $message   Swift_Message::newInstance()->......
     * @return boolean
     */
    public static function send_email($message) {
        //$transport = Swift_MailTransport::newInstance();   //simplest mail transport
        if (IS_PRODUCTION) {
            //if in test environment, no mail server
            $transport = Swift_SmtpTransport::newInstance(MAIL_SERVER, MAIL_PORT)
                    ->setUsername(MAIL_USER)
                    ->setPassword(MAIL_PASSWORD);
            //Create the Mailer using your created Transport
            $mailer = Swift_Mailer::newInstance($transport);
            //Send the message
            if ($mailer->send($message, $failures)) {
                Test::object_log('$description', 'succ', __FILE__, __LINE__, __CLASS__, __METHOD__);      
                return true;
            } else {
                Test::object_log('$description', 'fail', __FILE__, __LINE__, __CLASS__, __METHOD__);   
                return false;
            }
        } else {
            //if in test environement, will not send email and always true
            return true;
        }
    }

    

}