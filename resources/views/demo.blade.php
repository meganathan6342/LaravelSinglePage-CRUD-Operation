<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
</head>
<body>
<form action="/demo">
    <?php
    date_default_timezone_set("Asia/Kolkata");
    echo date("H:i:s");
    ?>
</form>
</body>
</html>