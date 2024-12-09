<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <title>Payment Results</title>
</head>

<body>
    <h1>Results</h1>
    <h2>Basic details from parameters response</h2>
    <?php
    if (!empty($_GET)) {
        foreach ($_GET as $key => $value) {
            // Decode the URL-encoded string
            $decodedValue = urldecode($value);

            // Check if the decoded value is valid JSON
            $jsonValue = json_decode($decodedValue, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                // If valid JSON, output it in JSON format
                echo "<p><strong>" . htmlspecialchars($key) . ":</strong> " . json_encode($jsonValue) . "</p>";
            } else {
                // If not JSON, output it as a regular string
                echo "<p><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($decodedValue) . "</p>";
            }
        }

        session_start();
        $access_token = $_SESSION["access_token"];

        $url = "https://secure.blinkpayment.co.uk/api/pay/v1/transactions/" . $_GET["transaction_id"];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  $url,
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
    } else {
        echo "<p>No URL parameters found.</p>";
    }
    ?>
  <h2>More details from GET by transaction_id</h2>
  <div id="trasnactionResponse"></div>

<script>
     const response = JSON.parse(<?php echo json_encode($response); ?>);
    //  console.log(JSON.parse(response))
    
// for (let i = 0;i< response.data.length;i++){
// const p = document.createElement("p");
// p.innerHTML = `<strong>${ response.data}</strong>`;
// }
for (info in response.data){
    const p = document.createElement("p");
    p.innerHTML = `<strong>${info}</strong>: ${response.data[info]}`;
    document.getElementById("trasnactionResponse").append(p)
}

</script>
<script src="../footer.js"></script>

</body>

</html>