<?php
if (isset($_REQUEST["email"])) {
    $to = "contact@couriertracking.com";
    $subject = "Contact Form Message";
    $txt  = "Message from: ".$_REQUEST["name"]."\r\n";
    $txt .= "Company: ".$_REQUEST["company"]."\r\n";
    $txt .= "Phone: ".$_REQUEST["phone"]."\r\n";
    $txt .= "Message:\r\n".    $_REQUEST["message"]."\r\n";
    $headers = "From: ".$_REQUEST["email"];
    if (mail($to,$subject,$txt,$headers)) {
        header("Location:contact.php?msg=Message%20Sent.");    
    } else {
        header("Location:contact.php?msg=Message%20could%20not%20be%20sent.");
    }    
}

