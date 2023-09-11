
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment Results</title>
    </head>
    <body>
        <h1>Results</h1>
    <?php 
    $tokenData = file_get_contents("../Token/token.json");
    $tokens = json_decode($tokenData);



    $headers = array(
        'Content-type: application/x-www-form-urlencoded',
        'Authorization: Bearer ' . $tokens->access_token
    );



        $queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
        parse_str($queryString, $params);

            $transactionId = $params['transaction_id'];
        
    
    
    $url = "https://secure.blinkpayment.co.uk/api/pay/v1/transactions/" .   $transactionId;
    $options = array(
        'http' => array(
            'header'  => implode("\r\n", $headers) . "\r\n",
            'method'  => 'GET',
        )
    );
    
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ 
    echo "Cannot load the transaction details";
    
    } else {
    
    
    $obj = json_decode($result);
   
 echo "<ul>";
 foreach($obj->data as $key => $value) {

    echo "<li>" . $key . ": " . $value . "</li>";
    }
    echo "</ul>";
    }
    ?>
    <br> <br>
<button onclick="restart()">Restart</button>

<script>
const restart = ()=>{
    window.location=document.URL.split("/redirect/")[0];
}
    
</script>
    </body>
    </html>
    
    