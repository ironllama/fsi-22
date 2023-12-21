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
    <title>SQL Functions</title>
</head>

<body>
    <h3>Ex1</h3>
    <table border=1>
        <tr><th>Brand</th><th>Model</th></tr>
    <?php
        $stmt = $db->prepare('SELECT UPPER(brand) AS brand, LOWER(model) AS model FROM phones LIMIT 10');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['brand']}</td><td>{$r['model']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex2</h3>
    <table border=1>
        <tr><th>Phone List</th></tr>
    <?php
        $stmt = $db->prepare('SELECT CONCAT(owner, " ---- ", model, "(", brand, ")", price, "$") AS pricelist FROM phones LIMIT 10');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['pricelist']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex3</h3>
    <table border=1>
        <tr><th>model</th><th>length comment</th></tr>
    <?php
        $stmt = $db->prepare('SELECT model, LENGTH(comment) AS comment FROM phones LIMIT 10');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['model']}</td><td>{$r['comment']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex4</h3>
    <table border=1>
        <tr><th>Average Phone's weight</th></tr>
    <?php
        $stmt = $db->prepare('SELECT AVG(weight) AS weight FROM phones WHERE owner="Brad"');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['weight']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex5</h3>
    <table border=1>
        <tr><th>Owner</th><th>Total Price</th></tr>
    <?php
        $stmt = $db->prepare('SELECT SUM(price) AS sum, owner FROM phones WHERE owner IN ("Brad", "Roland") GROUP BY owner');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['owner']}</td><td>{$r['sum']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex6</h3>
    <table border=1>
        <tr><th>Price</th></tr>
    <?php
        $stmt = $db->prepare('SELECT MAX(price) as max FROM phones WHERE owner = "Richard"');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['max']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex7</h3>
    <table border=1>
        <tr><th>Price</th></tr>
    <?php
        $stmt = $db->prepare('SELECT MIN(price) as min FROM phones WHERE owner = "Frank"');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['min']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex8</h3>
    <table border=1>
        <tr><th>Owner</th><th>Total Amount</th></tr>
    <?php
        $stmt = $db->prepare('SELECT COUNT(*) as num, owner FROM phones WHERE owner IN ("Brad", "Stacy") GROUP BY owner');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['owner']}</td><td>{$r['num']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex9</h3>
    <table border=1>
        <tr><th>Owner</th><th>Total Amount</th></tr>
    <?php
        $stmt = $db->prepare('SELECT COUNT(*) AS num, owner FROM phones GROUP BY owner');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['owner']}</td><td>{$r['num']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex10</h3>
    <table border=1>
        <tr><th>Brand</th><th>Total Amount</th></tr>
    <?php
        $stmt = $db->prepare('SELECT COUNT(*) AS num, brand FROM phones GROUP BY brand');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['brand']}</td><td>{$r['num']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex11</h3>
    <table border=1>
        <tr><th>Brand</th><th>Average Price</th><th>Phone Amount</th></tr>
    <?php
        $stmt = $db->prepare('SELECT COUNT(*) AS num, brand, ROUND(AVG(price)) AS avg FROM phones GROUP BY brand HAVING avg < 125');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['brand']}</td><td>{$r['avg']}</td><td>{$r['num']}</td></tr>";
        }
    ?>
    </table>

    <h3>Ex12</h3>
    <table border=1>
        <tr><th>Brand</th><th>Phone Amount</th></tr>
    <?php
        $stmt = $db->prepare('SELECT COUNT(*) AS num, brand FROM phones WHERE weight > 170 GROUP BY brand HAVING num > 3');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "<tr><td>{$r['brand']}</td><td>{$r['num']}</td></tr>";
        }
    ?>
    </table>
</body>

</html>