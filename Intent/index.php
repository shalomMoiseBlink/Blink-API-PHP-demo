<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <link rel="stylesheet" href="../style.css">
    <title>Create Intent</title>
    <?php

    session_start();
    $token_expired_on =  $_SESSION["token_expired_on"];
    $currencies_available =  $_SESSION["currencies_available"];
    $payment_types =  $_SESSION["payment_types"];
    ?>
</head>

<body>
    <h1>Intents Request</h1>
    <form action="./create-intent.php" method="post">
        <label for="amount">Amount</label>
        <input type="text" name="amount" id="amount" required value="1.01">

        <label for="currency">Currency</label>
        <select name="currency" id="currency" value="" required>

        </select>
        <br>
        <label for="transaction_type">Transaction type</label>
        <select name="transaction_type" id="transaction_type" value="SALE">
            <option value="SALE">SALE</option>
            <option value="PREAUTH">PREAUTH</option>
            <option value="VERIFY">VERIFY</option>
            <option value="CREDIT">CREDIT</option>
        </select>
        <br>
        <label for="payment_type">Payment type</label>
        <select name="payment_type" id="payment_type" value="" required>
        </select>
        <br>
        <label for="return_url">Return URL</label>
        <input class="read-only-input" type="text" name="return_url" id="return_url" value="./redirect" readonly required>
        <label for="notification_url">Notification URL</label>
        <input type="text" name="notification_url" id="notification_url" value="https://webhook.site/c0400872-2694-4490-bf78-21965b9083ef" required>
        <label for="card_layout">Card layout</label>
        <select name="card_layout" id="card_layout" value="">
            <option value="basic">basic</option>
            <option value="single-line">single-line</option>
            <option value="multi-line">multi-line</option>
        </select>
        <br>

        <h3>Optional Fields</h3>
        <label for="customer_name">Customer name</label>
        <input type="text" name="customer_name" id="customer_name">
        <label for="customer_email">Customer email</label>
        <input type="text" name="customer_email" id="customer_email">
        <label for="customer_address">Customer address </label>
        <input type="text" name="customer_address" id="customer_address">
        <label for="customer_postcode">Customer postcode</label>
        <input type="text" name="customer_postcode" id="customer_postcode">
        <label for="delay_capture_days">Delay till capture</label>
        <input type="number" id="delay_capture_days" name="delay_capture_days" min="1" max="30">
        <br>
        <input id="submitButton" type="submit" value="Make Intent">
    </form>
</body>
<script>
    document.getElementById("return_url").value = `${document.URL.split("Intent")[0]}redirect/`;

    const token_expired_on = <?php echo json_encode($token_expired_on); ?>;
        const currencies_available = <?php echo json_encode($currencies_available); ?>;
        const payment_types = <?php echo json_encode($payment_types); ?>;
        const addElements = (parentId, array) => {
            const input = document.getElementById(parentId);
            for (let i = 0; i < array.length; i++) {
                const option = document.createElement("option");
                option.id = array[i];
                option.value = array[i];
                option.innerHTML = array[i];
                input.appendChild(option)
            }

        }
        addElements("payment_type", payment_types);
        addElements("currency", currencies_available);
</script>
<script src="../footer.js"></script>

</html>