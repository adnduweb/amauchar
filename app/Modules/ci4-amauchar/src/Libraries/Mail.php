<?php

namespace Amauchar\Core\Libraries;

class Mail
{
    function sendAdmin($to, $subject, $message, $template = null) { 
        // $to = $this->request->getVar('mailTo');
        // $subject = $this->request->getVar('subject');
        // $message = $this->request->getVar('message');
        
        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom(setting('Email.fromEmail'), setting('Email.fromName'));
        
        $email->setSubject($subject);

        if(!is_null($template)){
            $email->setMessage($template);
        }else{
            $email->setMessage($message);
        }
        
        if ($email->send()) 
		{
            return true;
        } 
		else 
		{
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }
}
