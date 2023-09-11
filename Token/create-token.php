<?php


$keys = array(
    "api_key" => $_POST["api_key"],
    "secret_key" => $_POST["secret_key"],
    "enable_moto_payments" => true
   );
$url = "https://secure.blinkpayment.co.uk/api/pay/v1/tokens";
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($keys)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ 
echo "Error in token";

} else {


$obj = json_decode($result);
$token = $obj->{"access_token"};
file_put_contents("./token.json", json_encode($obj));
echo "<p> Token has been made. It is saved on the server for<a href='./token.json'> demo purposes <a> 
<br> go to  <a href='../Intent/create-intent.html'>here to create intent</a>.</p>";
}



?>