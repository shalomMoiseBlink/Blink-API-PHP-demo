<?php 

$tokenData = file_get_contents("../Token/token.json");
$data = json_decode($tokenData);

$headers = array(
    'Content-type: application/x-www-form-urlencoded',
    'Authorization: Bearer ' . $data->access_token,
//    'user-agent:' . $_SERVER['HTTP_USER_AGENT'],
//    'accept:' . $_SERVER['HTTP_ACCEPT'],
//    'accept-encoding: ' . $_SERVER['HTTP_ACCEPT_ENCODING'],
//    'accept-charset: ' . $_SERVER['HTTP_ACCEPT_CHARSET']
  "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36", 
     "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", 
     "accept-encoding: gzip, deflate, br", 
     "accept-charset: "
);

$url = "https://". $data -> blink_env.".blinkpayment.co.uk/api/pay/v1/googlepay";

$options = array(
    'http' => array(
        'header'  => implode("\r\n", $headers) . "\r\n",
        'method'  => 'POST',
        'content' => http_build_query($_POST)
    )
);

$context  = stream_context_create($options);
// echo $url . "<br>" . $context;
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ 
echo "Error in creating payment";
$error = error_get_last();
echo "Error: " . $error['message'];


} else {

echo "<p>Payment was completed go <a href='". $obj["url"] ."'>here to see the results </a></p>";
}

?> 