<?php

$tokenData = file_get_contents("../Token/token.json");
$data = json_decode($tokenData);

$headers = array(
    'Content-type: application/x-www-form-urlencoded',
    "Authorization: Bearer $data->access_token"
);

$url = "https://" . $data->blink_env . ".blinkpayment.co.uk/api/pay/v1/intents";

$postData = http_build_query($_POST);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $obj = json_decode($result);
    // $id = $obj->id;
    file_put_contents("./intent.json", json_encode($obj));
    echo "<p> Intent has been made. It has been saved on the server for <a href='./intent.json'> demo purposes</a>. <br>
    Go to <a href='../Payment/create-payment.php'  class='button'>here to load payment sheet and pay</a>
    </p>";
}

curl_close($ch);

echo '<script src="../footer.js"></script>';

