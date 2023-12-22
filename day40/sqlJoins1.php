<?php
require('../dbConnect.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Joins</title>
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
        // $stmtStr = "CREATE TABLE owner (
        //         id INT AUTO_INCREMENT PRIMARY KEY,
        //         lastname VARCHAR(255),
        //         firstname VARCHAR(255),
        //         phone_number VARCHAR(255)
        //         );";
        
        // $stmtStr .= "INSERT INTO owner (firstname) (SELECT DISTINCT(owner) FROM phones);";

        // $stmtStr .= "INSERT INTO owner (lastname, firstname) VALUES ('Sunday', 'Rose');";

        // $stmtStr .= "UPDATE owner SET phone_number = CONCAT('010', ROUND(RAND()*(99999999)+10000000));";

        // $stmtStr .= "ALTER TABLE phones ADD owner_id INT;";

        // $stmtStr .= "UPDATE phones SET owner_id = (SELECT id from owner WHERE firstname = phones.owner);";

        // $stmtStr .= "INSERT INTO phones (model, brand, price, weight, comment) VALUES ('iphone14', 'Apple', 1505, 200, 'exclusivity first on the market.');";

        // $stmtStr .= "ALTER TABLE phones DROP owner;";

        // $stmt = $db->prepare($stmtStr);
        // $stmt->execute();
    ?>

    <h3>Ex1</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT owner.firstname, phones.model FROM owner, phones WHERE owner.id = phones.owner_id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['firstname']} - {$r['model']}</div>";
        }
        echo "</div>";
    ?>
    </div>

    <h3>Ex2</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT owner.firstname, phones.model FROM owner INNER JOIN phones ON owner.id = phones.owner_id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['firstname']} - {$r['model']}</div>";
        }
        echo "</div>";
    ?>
    </div>

    <h3>Ex3</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT owner.firstname, phones.model FROM owner LEFT JOIN phones ON owner.id = phones.owner_id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['firstname']} - {$r['model']}</div>";
        }
        echo "</div>";
    ?>
    </div>

    <h3>Ex4</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT owner.firstname, phones.model FROM owner RIGHT JOIN phones ON owner.id = phones.owner_id');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<div class='resultGroup'>";
        foreach($results as $r) {
            echo "<div class='resultCell'>{$r['firstname']} - {$r['model']}</div>";
        }
        echo "</div>";
    ?>
    </div>
</body>
</html>