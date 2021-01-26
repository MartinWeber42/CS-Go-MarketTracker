<?php
// Get Specific CS GO Skin from Skinport Api
$itemName = rawurlencode($_POST['itemName']);

// get CS Go Item
$url = "https://api.skinport.com/v1/sales/history?app_id=730&market_hash_name=" . $itemName;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"authorization: Basic NDA3NmNiZTFkZGY4NDAxYjkwYWM1MjY5NTNkOWI4ZTk6Qk1jd0d5UFQ3di9Pb3FGbW5IaUljNExENm4yMzc4OXlhc3A4NGtSeHRoRUw2TGlFMVJaZ1BRb2tuSzE3MWhQRVI4VTFxNU9nRnJrTHF0Q0F3MHNCSkE9PQ==",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);
