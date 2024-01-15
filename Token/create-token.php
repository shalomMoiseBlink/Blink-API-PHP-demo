<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Token Success</title>
</head>

<body>



    <?php


    require '../vendor/autoload.php'; // Autoload the Composer packages

    $dotenv = Dotenv\Dotenv::createImmutable("http://localhost/sites/blinkapi-php"); // Replace __DIR__ with the path to your .env file
    $dotenv->load();
    $blink_env = $_POST['ENV'];
    $type = $_POST['type'];
 if($type === "CUSTOM") {
    $apiKey = $_POST["api_key"];
    $secretKey = $_POST["secret_key"];
 }else {
    $apiKey = $_ENV[$blink_env . "_" . $type . "_API_KEY"];
    $secretKey = $_ENV[$blink_env . "_" . $type . "_SECRET_KEY"];
 }
   
    $keys = array(
        "api_key" => $apiKey,
        "secret_key" => $secretKey,
        "enable_moto_payments" => true,
        "address_postcode_required" => true,
        'source_site' => 'http://localhost/sites/blinkapi-php',
        'application_name' => "Shalom's local site",
        'application_description' => "For testing the API"
    );

    $blinkEnvLowerCase = strtolower($blink_env);

    $url = "https://" . $blinkEnvLowerCase . ".blinkpayment.co.uk/api/pay/v1/tokens";
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
        // $token = $obj->{"access_token"};
        $obj->blink_env = $blinkEnvLowerCase;
        file_put_contents("./token.json", json_encode($obj));
        // echo "<p> Token has been made. It is saved on the server for<a href='./token.json'> demo purposes <a> 
        // <br> go to  <a href='../Intent/create-intent.html'>here to create intent</a>.</p>";
    }



    ?>

    <p> Token has been made. It is saved on the server for<a class="button" href='./token.json'> demo purposes <a>
                <br> go to <a class="button" href='../Intent/create-intent.html'>here to create intent</a>.</p>
    <script src="../footer.js"></script>

</body>

</html>