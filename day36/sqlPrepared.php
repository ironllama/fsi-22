<?php

$inBrand = "";
if (isset($_GET['brand'])) $inBrand = htmlspecialchars($_GET['brand']);

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

// BAD. Vulnerable to SQL Injection.
// $response = $db->query("SELECT brand, model FROM phones where brand='$inBrand'");

// GOOD. Replacement with prepared queries.
// $brandStmt = "";
// $brandParams = [];
// if ($inBrand !== "") {
//     $brandStmt = " AND brand=?";
//     $brandParams[] = $inBrand;
// }
// $response = $db->prepare("SELECT brand, model FROM phones where 1" . $brandStmt);
// $response->execute($brandParams);

// GOOD. Replacement with nominative markers.
$brandStmt = "";
$brandParams = [];
if ($inBrand !== "") {
    $brandStmt = " AND brand=:mybrand";
    $brandParams['mybrand'] = $inBrand;
}
$response = $db->prepare("SELECT brand, model FROM phones where 1" . $brandStmt);
$response->execute($brandParams);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Prepared</title>
</head>
<body>
    <table border=1>
        <tr>
            <td>make</td>
            <td>model</td>
        </tr>
    <?php
        $allPhones = $response->fetchAll(PDO::FETCH_ASSOC);
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