<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOTO Payment</title>
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://gateway2.blinkpayment.co.uk/sdk/web/v1/js/hostedfields.min.js"></script>
    <script src="https://secure.blinkpayment.co.uk/assets/js/api/custom.js"></script>
    <link rel="stylesheet" href="./hostedfield.css" class="hostedfield">
</head>

<body>


<h1>MOTO Single Payment</h1>

<?php 
    $url = "https://secure.blinkpayment.co.uk/api/pay/v1/intents";
session_start();
    $intent_id = $_SESSION["intent_id"];
    $access_token = $_SESSION["access_token"];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL =>  $url."/" . $intent_id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $access_token
        ),
    ));

    $response = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);

    ?>
<form action="./create-Payment.php" method="post" id="mainform">

</form>
<script>
     const intent = JSON.parse(<?php echo json_encode($response); ?>);
    const form = document.getElementById("mainform");
    if(intent.error)  form.innerHTML = intent.error;
    else form.innerHTML = intent.element.ccElement + "<input type='submit'>";
</script>
</body>

</html>