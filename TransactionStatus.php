<?php
include 'accessToken.php';
include 'securitycridential.php';
$TreansactionStatusUrl = 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$TransactionID = "NEF61H8J60";
$BusinessShortCode = "600782";
$phone = "254708374149";
$OriginatorConversationID = 'AG_20190826_0000777ab7d848b9e721';
$request_data = array(
    'Initiator' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => 'TransactionStatusQuery',
    'TransactionID' => $TransactionID,
    'OriginatorConversationID' => $OriginatorConversationID,
    'PartyA' => $BusinessShortCode,
    'IdentifierType' => '4',
    'ResultURL' => 'https://dar-15qy.onrender.com/ResultURL.php',
    'QueueTimeOutURL' => 'https://dar-15qy.onrender.com/QueueTimeOutURL.php',
    'Remarks' => 'OK',
    'Occasion' => 'OK',
);
$data_string = json_encode($request_data);
$headers = array(
    'Content-Type: application/json',
    'Authorization:Bearer ' . $access_token
);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $TreansactionStatusUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
if (curl_errno($curl)) {
    echo 'Error: ' . curl_error($curl);
}
curl_close($curl);
echo $response;

