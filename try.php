<?php
    // Account details
    $apiKey = urlencode('p3ND7BwGWLk-XdWEQfSqHli3n9IenWMhcbvu9sbTMp');
    
    // Message details
    $numbers = urlencode('7709828783,8411002338');
    $sender = urlencode('LNWELL');
    $message = rawurlencode('This is your message');

    // Prepare data for POST request
    $data = 'apikey=' . $apiKey . '&numbers=' . $numbers . "&sender=" . $sender . "&message=" . $message;

    // Send the GET request with cURL
    $ch = curl_init('https://api.textlocal.in/send/?' . $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Process your response here
    echo $response;
?>