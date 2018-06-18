<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$data = ['firstname' => "Miguel", "lastname" => "Fifi",
"birthday" => "1993-02-16", "address" => "sdds",
"email" => "msidj@sijdf", "user" => "Fifi", "password" => "lulu"];
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_URL, "http://localhost:8080/SiteDeFotos/webService/pessoa/create.php");

$result = curl_exec($ch);

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo '<hl>';
echo '<pre>' . print_r($httpCode, true) . '</pre><br>';
echo '<hl>';
echo '<pre>' . print_r(json_decode($result), true) . '</pre><br>';

?>
