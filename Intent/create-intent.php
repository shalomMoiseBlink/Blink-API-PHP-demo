<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <title>Intent Response</title>
</head>

<body>
    <h1>Intent Response</h1>

    <?php

    session_start();


    $url = "https://secure.blinkpayment.co.uk/api/pay/v1/intents";

    $curl = curl_init();
    $access_token = $_SESSION["access_token"];
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($_POST),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $access_token
        ),
    ));

    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);


    $saveSession = json_decode($response, true);
    if ($httpcode === 201) {
        $_SESSION["intent_id"] = $saveSession["id"];
       
    }

    curl_close($curl);
    $element = $saveSession["element"];
    foreach ($element as $field => $value) {
        $saveSession["element"][$field] = htmlspecialchars($value);
     }

    $json_string = json_encode($saveSession, JSON_PRETTY_PRINT);

    echo "<span><pre class='json' id='jsonResponse'> $json_string;</pre></span>";
    ?>

<p> Intent has been made.
    Go to <a href='../Payment/creditcards/'  class='button'>here to load payment sheet and pay</a>.</p>
    <script src="../footer.js"></script>


</body>

</html>