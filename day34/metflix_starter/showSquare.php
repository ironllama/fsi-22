<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Click on the square</h1>

    <?php
    include("./pulsingSquare.php");
    // require("./something.php");
    // include("./something.php");
    ?>
    <p>Directions on how to use the square: Click on it.</p>
</body>
</html>