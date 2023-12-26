<?php

require_once("./vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;

class sndMail
{
    private $f;
    private $valid = array("success" => false, "message" => "");
    private $mail;

    public function __construct() {
        if (!session_id()) {
            session_start();
        }
        $this->f = "file.txt";
        file_put_contents($this->f, "file ready".PHP_EOL, FILE_APPEND | LOCK_EX);
    }

    public function contactEnquiry($data) {
        $this->sendEnquiryMailToEnquirer($data['username'], $data['email']);
        $this->sendEnquiryMailToAdmin($data);
        return $this->valid;
    }

  

    public function sendEnquiryMailToEnquirer($name, $mailId) {
     
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.hostinger.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        // to be changes for production env.
        $mail->Username = "contact@blackitechs.com";
        $mail->Password = "Contact@bits#737";
        $mail->setFrom("contact@blackitechs.com", "Mail from Black I Technologies and Solutions");

        // admin address ~ ~ user mail id ~
        $mail->AddAddress($mailId);

        $mail->Subject = "Your enquiry is taken into consideration - ". $name;

        $mail->msgHTML("
            <br />
            <br />
            Will get back to you shortly
            <br />
            <br />
            Thanks and Regards, <br />
            Team BITS
        ");
        if ($mail->send()) {
            file_put_contents($this->f, "Mail sent to ".$name." for Enquiry". PHP_EOL, FILE_APPEND | LOCK_EX);
            $this->valid['success'] = true;
            $this->valid['message'] = "Mail sent successfully...!!!";
        } else {
            file_put_contents($this->f, "Failed to send mail to ".$name." for Enquiry " . PHP_EOL, FILE_APPEND | LOCK_EX);
            $this->valid['success'] = false;
            $this->valid['message'] = "Failed to send mail...!!!";
        }
        return $this->valid;
    }

    public function sendEnquiryMailToAdmin($data) {
        
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.hostinger.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        // to be changes for production env.
        $mail->Username = "contact@blackitechs.com";
        $mail->Password = "Contact@bits#737";
        $mail->setFrom("contact@blackitechs.com", "Mail from Black I Technologies and Solutions");

        // to be changes for production env.
        $mail->AddAddress("contact@blackitechs.com");

        $mail->Subject = "New enquiry - ". $data['username'];

        $mail->msgHTML("  
        <h3> Contact details: </h3>
        <strong> Name: </strong> ". $data['name'] ." <br />
        <strong> Email: </strong> ". $data['email'] ." <br />
        <strong> Phone: </strong> ". $data['number'] ." <br />
        <strong> Message: </strong> ". $data['message'] ." <br />

        ");
        if ($mail->send()) {
            file_put_contents($this->f, "Mail sent to admin for ".$data['username']." - Enquiry". PHP_EOL, FILE_APPEND | LOCK_EX);
            $this->valid['success'] = true;
            $this->valid['message'] = "Mail sent successfully...!!!";
        } else {
            file_put_contents($this->f, "Failed to send mail to admin for ".$data['username']."- Enquiry " . PHP_EOL, FILE_APPEND | LOCK_EX);
            $this->valid['success'] = false;
            $this->valid['message'] = "Failed to send mail...!!!";
        }
        return $this->valid;
    }

   

    
}

?>