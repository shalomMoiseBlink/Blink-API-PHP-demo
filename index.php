<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>API Demo</title>
    <link rel="icon" type="image/x-icon"
        href="https://cdn.prod.website-files.com/6324aaf0dd1b260cb7f38cb0/6671a8a3fd1b843e406bdcc8_favicon.png">
    <link rel="stylesheet" href="https://secure.blinkpayment.co.uk/assets/css/api.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="header">
    <h1>Blink API - Card Ecom Demo</h1>
    <span>This is a basic demo of the blink API to make a card payment. <br> Please enter your <a href="https://secure.blinkpayment.co.uk/admin/customer-centre/blink-pages" target="_blank" rel="noopener noreferrer">keys</a> below to get started. <br> <a target="blank" href="https://api-docs.blinkpayment.co.uk/">Full Doc Site</a></span>
    </div>
    <br>
    <br>
    <form action="./Token/create-token.php" method="post" id="tokenForm">
    <label for="api_key">API Key</label>
                <input type="text" name="api_key" id="api_key" required
                    value="">
                <label for="secret_key">Secret Key</label>
                <input type="text" name="secret_key" id="secret_key" required
                    value="">
                <br>
                <label for="enable_moto_payments">Enable MOTO payments</label>
                <select name="enable_moto_payments" id="enable_moto_payments" value=true>
                    <option value=true>True</option>
                    <option value=false>False</option>
                </select>
                <br>
                <label for="send_blink_receipt">Send blink receipts</label>
                <select name="send_blink_receipt" id="send_blink_receipt" value=true>
                    <option value=true>True</option>
                    <option value=false>False</option>
                </select>
                <br>
                <label for="address_postcode_required">Address postcode required </label>
                <select name="address_postcode_required" id="address_postcode_required" value=true>
                    <option value=true>True</option>
                    <option value=false>False</option>
                </select>
                <br>
                <label for="application_name ">Application name</label>
                <input type="text" name="application_name" id="application_name" value="Blink API PHP Demo">
                <label for="application_description">Application description</label>
                <input type="text" name="application_description" id="application_description"
                    value="Demo App to try the API">
                <label for="source_site">Source site</label>
                <input class="read-only-input" type="text" name="source_site" id="source_site" readonly>
                <br>   
        <br>
        <br>
    <input type="submit" value="Create Token" class="button">
    </form>

    <script>
                document.getElementById("source_site").value = window.location.href;
    </script>

</body>
</html>