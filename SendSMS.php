<?php

// Replace with your username
$user = "Learnwell";

// Replace with your API KEY (We have sent API KEY on activation email, also available on panel)
$apikey = "	0LUTPTQ7Gy2IgB01zhLU"; 

// Replace if you have your own Sender ID, else donot change
$senderid  =  "VRMCAR"; 

// Replace with the destination mobile Number to which you want to send sms
$mobile  =  $_POST['mobileNum'];

// Replace with your Message content
$message   =  "Testing  ABCD SMS API"; 
$message = urlencode($message);

// For Plain Text, use "txt" ; for Unicode symbols or regional Languages like hindi/tamil/kannada use "uni"
$type   =  "txt";

$ch = curl_init("http://smshorizon.co.in/api/sendsms.php?user=".$user."&apikey=".$apikey."&mobile=".$mobile."&senderid=".$senderid."&message=".$message."&type=".$type.""); 
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);      
    curl_close($ch); 

// Display MSGID of the successful sms push
echo $output;


?>

