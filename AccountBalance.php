<?php
include 'accessToken.php';
include 'securitycridential.php';
$AccountBalanceUrl = 'https://sandbox.safaricom.co.ke/mpesa/accountbalance/v1/query';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!"; 
$BusinessShortCode = "600982"; 
$request_data = array(
    'Initiator' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => 'AccountBalance',
    'PartyA' => $BusinessShortCode,
    'IdentifierType' => '4',
    'Remarks' => 'ok',
    'QueueTimeOutURL' => 'https://dar-15qy.onrender.com/QueueTimeOutURL.php',
    'ResultURL' => 'https://dar-15qy.onrender.com/ResultURL.php',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $AccountBalanceUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);
echo $response;
?>
