<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Sheet</title>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://gateway2.blinkpayment.co.uk/sdk/web/v1/js/hostedfields.min.js"></script>
<script src="https://dev.blinkpayment.co.uk/assets/js/api/custom.js"></script>
<script src="https://dev.blinkpayment.co.uk/assets/js/google-pay-api.js"></script>
</head>
 <link rel="stylesheet" href="test.css" class="hostedfield"> 

 

</head>

<body>
<h1>Payment Sheet</h1>

     <form id="paymentForm" action="./process-card.php" method="post">
  <?php
  $intent = json_decode(file_get_contents("../Intent/intent.json"), true);
 echo $intent['element']['ccElement'] . "<input type='submit' value='submit'/>";
  
  ?>
    </form>

<form action="./process-card.php" method="post">
<?php
echo $intent['element']['gpElement'];
?>
</form>
<br> 
  
<br>

</body>
<script src="../footer.js"></script>


</html>