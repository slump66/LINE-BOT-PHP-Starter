<?php
$access_token = 'dA+rFltQVaqYJhHfvpdvsu1aYN3go4QrjmXLV8T7fqLSfXOImANo27yCIKs4dyxKO0smSwerJq5/cMkGSfWCtSv0ZlYpkKKf7rkmko6W1Ah5ojntLMEpifHhslw9ywEDpoH+d76U8y7BGyUSRfJG7gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
