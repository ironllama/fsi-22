<?php
require('../dbConnect.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Joins 2</title>
    <style>
        .resultGroup {
            width: 610px;
        }
        .resultCell {
            display: inline-block;
            width: 300px;
        }
    </style>
</head>
<body>
    <h3>PREP</h3>
    <?php
        $stmtStr = "";

        $stmtStr = "CREATE TABLE brand (
                id INT AUTO_INCREMENT PRIMARY KEY,
                brand_name VARCHAR(255)
                );";
        
        $stmtStr .= "INSERT INTO brand (brand_name) SELECT DISTINCT(brand) FROM phones;";

        $stmtStr .= "INSERT INTO brand (brand_name) VALUES ('wcoding');";

        $stmtStr .= "ALTER TABLE phones ADD brand_id INT AFTER model;";

        $stmtStr .= "UPDATE phones SET brand_id = (SELECT id from brand WHERE brand_name = phones.brand);";

        $stmtStr .= "INSERT INTO phones (model, price, weight, comment) VALUES ('MegaPhone', 9999, 999, 'Can you hear me now?');";

        $stmtStr .= "ALTER TABLE phones DROP brand;";

        try {
            $db->beginTransaction();

            $stmt = $db->prepare($stmtStr);
            $stmt->execute();
            // $stmt->closeCursor();

            $db->commit();
        }
        catch (Exception $bad) {
            echo "ERROR, WILL ROBINSON, ERROR: " . $bad->getMessage();
            $db->rollBack();
        }
    ?>

    <h3>Ex1</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT phones.model, brand.brand_name FROM phones, brand WHERE phones.brand_id = brand.id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['model']} - {$r['brand_name']}</div>";
        }
        echo "</div>";
    ?>
    </div>

    <h3>Ex2</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT phones.model, brand.brand_name FROM phones INNER JOIN brand ON phones.brand_id = brand.id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['model']} - {$r['brand_name']}</div>";
        }
        echo "</div>";
    ?>
    </div>

    <h3>Ex3</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT phones.model, brand.brand_name FROM phones LEFT JOIN brand ON phones.brand_id = brand.id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['model']} - {$r['brand_name']}</div>";
        }
        echo "</div>";
    ?>
    </div>

    <h3>Ex4</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT phones.model, brand.brand_name FROM phones RIGHT JOIN brand ON phones.brand_id = brand.id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['model']} - {$r['brand_name']}</div>";
        }
        echo "</div>";
    ?>
    </div>
</body>
</html>