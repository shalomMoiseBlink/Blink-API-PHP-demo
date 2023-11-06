<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <script src="./custom.js"></script> -->
  <title>Google Pay Test</title>
</head>

<body>

  <br>
  <h2>Google Pay</h2>
  <form id="googleForm" action="googleReq.php" method="POST">


  </form>
  <div id="response""></div>
  <div id="environmentTest">

  <?php 
$env = $_GET["googleEnv"];
if($env ==="TEST") {
  $otherEnv = "PRODUCTION";  
} else {
  $otherEnv = "TEST";  
}

$inputUrl = $_SERVER["SERVER_NAME"].  $_SERVER["REQUEST_URI"];

// Parse the URL to get the query string
$queryString = parse_url($inputUrl, PHP_URL_QUERY);

// Parse the query string into an associative array
parse_str($queryString, $queryParams);

// Check if the "googleEnv" parameter exists and change its value
if (isset($queryParams['googleEnv']) && $queryParams['googleEnv'] === $env) {
    $queryParams['googleEnv'] = $otherEnv;
}

// Reconstruct the modified query string
$modifiedQueryString = http_build_query($queryParams);

// Rebuild the URL with the modified query string
$modifiedUrl = str_replace($queryString, $modifiedQueryString, $inputUrl);

?>
    <p>The Google Environment is now <?php echo $env;?>.</p>
    <p>Change it to <a href="http://<?php echo $modifiedUrl;?>"><?php echo $otherEnv;?></a></p>
  </div>
  <script src="./blinkgooglepay.js?intentId=<?php echo $_GET["intentId"];?>&googleEnv=<?php echo $env;?>"></script>
</body>

</html>