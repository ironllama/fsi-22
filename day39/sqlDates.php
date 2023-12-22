<?php
require('../dbConnect.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Dates</title>
</head>
<body>
    <h3>Ex1</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, date_created FROM chats WHERE DATE(date_created) = "2023-12-21"');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>

    <h3>Ex2</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, date_created FROM chats WHERE date_created = "2023-12-21 12:10:12"');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>

    <h3>Ex3</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, date_created FROM chats WHERE HOUR(date_created) BETWEEN 12 and 13');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>

    <h3>Ex4</h3>
    <div>
    <?php
        // $stmt = $db->prepare('INSERT INTO chats (pseudo, message, date_created) VALUES ("Marty", "Doc, where are you?", "2023-12-19"), ("Doc", "I need more stuff for my flux capacitor!", "2023-12-19")');
        // $stmt->execute();
        // echo $stmt->rowCount() . " rows inserted.";
    ?>
    </div>
    
    <h3>Ex5</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, date_created FROM chats WHERE DATE(DATE_ADD(date_created, INTERVAL 2 DAY)) = DATE(NOW())');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>
    
    <h3>Ex6</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, date_created FROM chats WHERE DATE(date_created) = "2023-12-19" AND HOUR(date_created) = 12 AND MINUTE(date_created) = 12');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>
    
    <h3>Ex7</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, CONCAT(DAY(date_created), "/", MONTH(date_created), "/", YEAR(date_created)) AS date_created FROM chats LIMIT 20');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>

    <h3>Ex8</h3>
    <div>
    <?php
        $stmt = $db->prepare('SELECT pseudo, message, DATE_FORMAT(date_created, "%d/%m/%Y") AS date_created FROM chats LIMIT 20');
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $r) {
            echo "{$r['date_created']}: {$r['pseudo']}: {$r['message']}<br>";
        }
    ?>
    </div>

    <h3>Ex9</h3>
    <div>
    <?php
        // $stmt = $db->prepare("ALTER TABLE chats ADD expires_new DATETIME DEFAULT DATE_ADD(NOW(), INTERVAL 2 MONTH);
        //                         UPDATE chats SET expires_new = DATE_ADD(date_created, INTERVAL 2 MONTH)");
        // $stmt->execute();
        // echo $stmt->rowCount() . " rows affected.";
    ?>
    </div>
</body>
</html>