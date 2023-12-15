<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetFlix</title>
    <link rel="stylesheet" href="card.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <?php
        $moviesStr = file_get_contents("movies.json");
        $moviesArr = json_decode($moviesStr, true)["movies"];

        foreach($moviesArr as $movie) {
            include("card.php");
        }
    ?>
</body>
</html>