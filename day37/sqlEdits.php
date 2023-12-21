<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Edits</title>
</head>
<body>
    <h3>Ex1</h3>
    <?php
        // $numRows = $db->exec('INSERT INTO phones (brand, model, owner, weight, comment, price) VALUES ("Samsung", "S8 Plus", "Alexis", 173, "Good for watching videos", 80)');
        // echo "<p>$numRows rows updated.</p>";
    ?>

    <h3>Ex2</h3>
    <?php
        // $stmt = $db->prepare('INSERT INTO phones (brand, model, owner, weight, comment, price) VALUES (:brand, :model, :owner, :weight, :comment, :price)');
        // $stmt->execute([
        //     "brand" => "Apple",
        //     "model" => "iPhone 12",
        //     "owner" => "Alex",
        //     "weight" => 164,
        //     "comment" => "my company provided a phone i don’t need this one anymore, brand new",
        //     "price" => 700,
        // ]);
        // echo "<p>$stmt->rowCount rows updated.</p>";
    ?>

    <h3>Ex3</h3>
    <?php
        // $numRows = $db->exec('UPDATE phones SET price=690 WHERE owner="Alex" AND model="iPhone 12"');
        // echo "<p>$numRows rows updated.</p>";
    ?>

    <h3>Ex4</h3>
    <?php
        // $stmt = $db->prepare('UPDATE phones SET comment=:comment WHERE owner=:owner');
        // $stmt->execute([
        //     "owner" => "Alex",
        //     "comment" => "Good for watching videos and listening to music.",
        // ]);
        // echo "<p>{$stmt->rowCount()} rows updated.</p>";
    ?>

    <h3>Ex5</h3>
    <?php
        $stmt = $db->prepare('DELETE FROM phones WHERE owner=:owner AND brand=:brand AND model=:model');
        $stmt->execute([
            "owner" => "Alexis",
            "brand" => "Samsung",
            "model" => "S8 Plus",
        ]);
        echo "<p>{$stmt->rowCount()} rows updated.</p>";
    ?>

</body>
</html>