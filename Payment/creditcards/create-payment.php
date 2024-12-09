<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <title>Document</title>
</head>

<body>
    <h1>Submitting Payment</h1>
    <?php
    if (isset($_POST)) {
        $resource = $_POST["resource"] ?? "creditcards";
        $url = "https://secure.blinkpayment.co.uk/api/pay/v1/" . $_POST["resource"];
        session_start();
        $access_token = $_SESSION["access_token"];
        $curl = curl_init();
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'DefaultUserAgent/1.0';
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
                'Authorization: Bearer ' . $access_token,
                'User-Agent: ' . $userAgent,
                'Accept-Encoding: application/json',
                'accept-charset: application/json'
            ),
        ));

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $creditcardResponse = json_decode($response, true);
        if (isset($creditcardResponse['url'])) {
            header("Location: " . $creditcardResponse['url']);
            exit;
        } else if (isset($creditcardResponse['acsform'])) {
            echo $creditcardResponse['acsform'] . "<script>    onload = () => document.forms[0].submit();  </script>";
        } else {
            var_dump($creditcardResponse);
            die("Error: URL not found in response.");
        }
    }

    ?>
</body>



</html>