<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>API Demo</title>
</head>

<body>
    <h1>Blink API - Card Ecom Demo</h1>
    <span>This is a basic demo of the blink API to make a card payment. <br> Please enter your keys below to get started.</span>
    <br>
    <br>
    <form action="./Token/create-token.php" method="post" id="tokenForm">
        <label for="ENV">Choose an Environment:</label>
        <select id="ENV" name="ENV">
            <option value="DEV">DEV</option>
            <option value="TST">TST</option>
            <option value="PPD">PPD</option>
            <option value="SECURE">SECURE</option>
        </select>

        <br>
        <label for="type">Live or demo?</label>
        <select id="type" name="type" onchange="checkIfCustom()">
            <option value="DEMO">DEMO</option>
            <option value="LIVE">LIVE</option>
            <option value="CUSTOM">CUSTOM</option>
        </select>
        <br>
        <div id="customKeys"></div>
        <br>
    <input type="submit" value="Create Token" class="button">
    </form>
</body>
<script>
const checkIfCustom =() =>{
    if(document.getElementById("type").value === "CUSTOM") {
    document.getElementById("customKeys").innerHTML = '<br> <label for="api_key">API Key: </label> <input type="text" name="api_key" id="api_key"><br><br><label for="secret_key">Secret Key: </label> <input type="text" name="secret_key" id="secret_key">';
    }
}
</script>
</html>