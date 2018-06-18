<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/SiteDeFotos/webService/pessoa/read.php");

$result = curl_exec($ch);

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo '<hl>';
echo '<pre>' . print_r($httpCode, true) . '</pre><br>';
echo '<hl>';
echo '<pre>' . print_r(json_decode($result), true) . '</pre><br>';

?>
