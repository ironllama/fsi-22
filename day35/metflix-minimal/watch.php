<?php
    $title = "Random";
    if (isset($_GET['title'])) $title = htmlspecialchars($_GET['title']);

    $path = "";
    if (isset($_GET['path'])) $path = htmlspecialchars($_GET['path']);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        video {
            height: 720px;
            width: 1080px;
        }
    </style>
</head>
<body>
    <video autoplay muted controls src="<?= $path ?>">
</body>
</html>