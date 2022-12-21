<?php 

require_once "vendor/autoload.php";

    class sendEmail{

        public static function sendMail($to,$subject, $content){

            $key= "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";

            $email= new \SendGrid\Mail\Mail();
            $email->setFrom("jordonwilliams2539@gmail.com","Jordon Williams");
            $email->setSubject($subject);
            $email->addTo($to);
            $email->addContent("text/html", $content);

            $sendgrid = new \SendGrid($key);

            try{
                $response= $sendgrid->send($email);
                return $response;
            }catch(Exception $e){
                echo "email exception caught:", $e->getMessage();
                return false;
            }
            
        }
    }

?>