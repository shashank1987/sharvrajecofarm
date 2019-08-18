<?php
	if( isset($_POST['action']) && $_POST['action']==1) {
        
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $to = '<contact@sharvrajecofarm.com>'; // Receiver Email ID, Replace with your email ID
        $subject = 'CodeBurg';
        $message = "Name: ".ucwords($name)."\n".
                  "Phone Number: ".$phone."\n".
                  "Email address: ".$email;
        $headers = "From: ".$email;

        if(mail($to, $subject, $message, $headers)) {
            echo "1";  
        }
    }
?>