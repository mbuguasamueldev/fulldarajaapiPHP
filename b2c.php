<?php
include 'accessToken.php';
include 'securitycridential.php';
$b2c_url = 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
$InitiatorName = 'testapi';
$pass = "Safaricom999!*!";
$BusinessShortCode = "600988";
$phone = "254708374149";
$amountsend = $_POST['amount'];
//$SecurityCredential ='X9AN83D+1nhk20hYn6YdWlRMpRd/ihVJfi3d4bsxBrYhyiA9x681tzOykdI6rEFI8NODynelCA2LNDoRBPCysyI/BfI9xe7TSF+Q6dhcD8M1l7oWGlcDTzM4RqY+W1ECPiQhpf5H3Z5ACLJSRNmU21YR4sfFzuOb2Ldt9jZwQNpBs/Z6tWjIKz/SbtPgZcj/+8Miy65+UtH0KSdfsef/fZnxNXOF5S9PX82RN0Y2hf1u13Iqs5WiCT/TICqcODEKozU4/h/sQ8gqjQ51ROzOEv+FacrZRv4/qLPBbOk4Ix8j6f5Nra0GcLwFS9BJBdrMyaypr7OtCD1KxVlvhm8epg==';
$CommandID = 'BusinessPayment'; // SalaryPayment, BusinessPayment, PromotionPayment
$Amount = $amountsend;
$PartyA = $BusinessShortCode;
$PartyB = $phone;
$Remarks = 'Umeskia Withdrawal';
$QueueTimeOutURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/b2cCallbackurl.php';
$ResultURL = 'https://1c95-105-161-14-223.ngrok-free.app/MPEsa-Daraja-Api/dataMaxcallbackurl.php';
$Occasion = 'Online Payment';
/* Main B2C Request to the API */
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $b2c_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token]);
$curl_post_data = array(
    'InitiatorName' => $InitiatorName,
    'SecurityCredential' => $SecurityCredential,
    'CommandID' => $CommandID,
    'Amount' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $PartyB,
    'Remarks' => $Remarks,
    'QueueTimeOutURL' => $QueueTimeOutURL,
    'ResultURL' => $ResultURL,
    'Occasion' => $Occasion
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;
