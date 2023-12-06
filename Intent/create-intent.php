<?php 

$tokenData = file_get_contents("../Token/token.json");
$data = json_decode($tokenData);

$headers = array(
    'Content-type: application/x-www-form-urlencoded',
    'Authorization: Bearer ' . $data->access_token
);

$url = "https://". $data -> blink_env.".blinkpayment.co.uk/api/pay/v1/intents";


$options = array(
    'http' => array(
        'header'  => implode("\r\n", $headers) . "\r\n",
        'method'  => 'POST',
        'content' => http_build_query($_POST)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ 
echo "Error in token";
var_dump($result);
} else {


$obj = json_decode($result);
$id = $obj->id;
file_put_contents("./intent.json", json_encode($obj));
echo "<p> Intent has been made. It has beens saved on the server for <a href='./intent.json'> demo purposes</a>. <br>
Go to <a href='../Payment/create-payment.php'  class='button'>here to load payment sheet and pay</a>
Or Try <a href='../Gpay/?intentId=". $id ."&googleEnv=TEST' class='button' >Google Pay</a>
</p>";
}
echo '<script src="../footer.js"></script>';
?>