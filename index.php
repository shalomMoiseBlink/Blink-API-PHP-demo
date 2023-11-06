<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <option value="SECURE">SECURE</option>
        </select>

        <br>
        <label for="type">Live or demo?</label>
        <select id="type" name="type">
            <option value="DEMO">DEMO</option>
            <option value="LIVE">LIVE</option>
        </select>
        <br><br>
        <input type="submit" value="Create Token">
    </form>
</body>

<script src="./env.js"></script>

</html>