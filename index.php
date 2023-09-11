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
<form action="./Token/create-token.php" method="post">
        <label for="api_key">API KEY: </label>
        <input type="text" name="api_key" id="api_key" placeholder="api_key" value="">
      
        <br>
        <label for="secret_key">SECRET KEY: </label>
        <input type="text" name="secret_key" id="secret_key" placeholder="secret_key" value="">
        <br>
        <input type="submit" value="Create Token">
    </form>
</body>
</html>