<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$response = $db->query('SELECT brand, model FROM phones where brand="Nokia"');
$response2 = $db->query('SELECT brand, model FROM phones where brand="Nokia"');

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Demo</title>
</head>
<body>
    <table border=1>
        <tr>
            <td>make</td>
            <td>model</td>
        </tr>
    <?php
        while($phone = $response->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?= $phone['brand'] ?></td>
            <td><?= $phone['model'] ?></td>
        </tr>
    <?php
        }  // End while.
        // $response->closeCursor();
    ?>
    <table>

    <table border=1>
        <tr>
            <td>make</td>
            <td>model</td>
        </tr>
    <?php
        $allPhones = $response2->fetchAll(PDO::FETCH_ASSOC);
        foreach($allPhones as $phone) {
        ?>
            <tr>
                <td><?= $phone['brand'] ?></td>
                <td><?= $phone['model'] ?></td>
            </tr>
        <?php
        }  // End foreach.
        // $response->closeCursor();
    ?>
    <table>
</body>
</html>