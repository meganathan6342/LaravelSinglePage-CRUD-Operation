<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
</head>
<body>
<form action="/submit-form" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="number" name="age" placeholder="Age">
    <button type="submit">Submit</button>
</form>

</body>
</html>