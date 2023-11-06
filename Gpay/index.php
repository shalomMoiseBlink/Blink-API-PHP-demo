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

  <script src="./blinkgooglepay.js?intentId=<?php echo $_GET["intentId"];?>"></script>
</body>

</html>