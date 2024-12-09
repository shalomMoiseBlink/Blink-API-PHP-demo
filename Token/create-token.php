<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <title>Token Success</title>
</head>

<body>

    <h1>Tokens Response</h1>
    <?php

    if (isset($_POST)) {

        foreach ($_POST as $field => $value) {
            if ($value == "true") $_POST[$field] = true;
            if ($value == "false") $_POST[$field] = false;
        }
        $url = "https://secure.blinkpayment.co.uk/api/pay/v1/tokens";
        $curl = curl_init();

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
                'Accept: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);


        session_start();
        session_unset();
        $saveSession = json_decode($response, true);
        if ($httpcode === 201) {
            $_SESSION["access_token"] = $saveSession["access_token"];
            $_SESSION["currencies_available"] = $saveSession["currencies"];
            $_SESSION["token_expired_on"] = $saveSession["expired_on"];
            $_SESSION["payment_types"] = $saveSession["payment_types"];
        }
    }

    $json_string = json_encode($saveSession, JSON_PRETTY_PRINT);

    echo "<span><pre class='json' id='jsonResponse'> $json_string;</pre></span>";
    ?>
    <br> <br>

    <p>After creating a token, <a class="button" href='../Intent/'>create an intent</a>.</p>
    <script src="../footer.js"></script>

</body>

</html>