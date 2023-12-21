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
    <title>SQL Selects</title>
</head>
<body>
    <?php
        function getResultsForQuery($title, $qStr, $bindParams = null) {
            global $db;

            $ex1 = $db->prepare($qStr);

            if ($bindParams) {
                if (array_is_list($bindParams)) {  // Standard array for positional markers.
                    // foreach($bindParams as $i => $bp) {  // THIS IS BORKED.
                    for ($i = 0; $i < count($bindParams); $i++) {
                        $pdoType = PDO::PARAM_STR;
                        if (gettype($bindParams[$i]) == "integer") $pdoType = PDO::PARAM_INT;
                        $ex1->bindParam($i + 1, $bindParams[$i], $pdoType);

                        // $first = "Victoria";
                        // $ex1->bindParam(1, $first, $pdoType);
                        // $second = "Nokia";
                        // $ex1->bindParam(2, $second, $pdoType);

                        // $ex1->bindParam(1, "Victoria", $pdoType);
                        // $ex1->bindParam(2, "Nokia", $pdoType);
                    }
                } else {  // Associative array for nominative markers.
                    $allKeys = array_keys($bindParams);
                    for ($i = 0; $i < count($allKeys); $i++) {
                        $key = $allKeys[$i];
                        $pdoType = PDO::PARAM_STR;
                        if (gettype($bindParams[$key]) == "integer") $pdoType = PDO::PARAM_INT;
                        $ex1->bindParam($key, $bindParams[$key], $pdoType);
                    }
                }
            }

            $ex1->execute();
            $r1 = $ex1->fetchAll(PDO::FETCH_ASSOC);
            echo "<h3>$title</h3>";
            echo "<ul>";
            foreach($r1 as $result) {
            ?>
                <li>Model: <?= $result['model'] ?> Brand: <?= $result['brand'] ?><br>
                    Owned by: <?= $result['owner'] ?><br>
                    (<?= $result['price'] ?> dollars)</li>
            <?php
            }  // End foreach.
            echo "</ul>";
        }

        getResultsForQuery("Ex1", 'SELECT model, brand, owner, price FROM phones WHERE owner="Stacy"');

        getResultsForQuery("Ex2", 'SELECT model, brand, owner, price FROM phones WHERE weight=295');

        getResultsForQuery("Ex3", 'SELECT model, brand, owner, price FROM phones WHERE brand="Nokia"');

        // getResultsForQuery("Ex4", 'SELECT model, brand, owner, price FROM phones WHERE brand="Nokia" OR brand="Apple"');
        getResultsForQuery("Ex4", 'SELECT model, brand, owner, price FROM phones WHERE brand IN ("Nokia", "Apple")');

        getResultsForQuery("Ex5", 'SELECT model, brand, owner, price FROM phones WHERE price=115');

        getResultsForQuery("Ex6", 'SELECT model, brand, owner, price FROM phones ORDER BY weight LIMIT 10');

        getResultsForQuery("Ex7", 'SELECT model, brand, owner, price FROM phones WHERE owner="Victoria" LIMIT 5');

        getResultsForQuery("Ex8", 'SELECT model, brand, owner, price FROM phones WHERE owner="Nina" AND price<250 ORDER BY price DESC');

        // Using positional markers.
        getResultsForQuery("Ex1", 'SELECT model, brand, owner, price FROM phones WHERE owner=?', ["Stacy"]);

        getResultsForQuery("Ex2", 'SELECT model, brand, owner, price FROM phones WHERE weight=?', [295]);

        getResultsForQuery("Ex3", 'SELECT model, brand, owner, price FROM phones WHERE brand=?', ["Nokia"]);

        // getResultsForQuery("Ex4", 'SELECT model, brand, owner, price FROM phones WHERE brand="Nokia" OR brand="Apple"');
        getResultsForQuery("Ex4", 'SELECT model, brand, owner, price FROM phones WHERE brand IN (?, ?)', ["Nokia", "Apple"]);

        getResultsForQuery("Ex5", 'SELECT model, brand, owner, price FROM phones WHERE price=?', [115]);

        getResultsForQuery("Ex6", 'SELECT model, brand, owner, price FROM phones ORDER BY weight LIMIT ?', [10]);

        getResultsForQuery("Ex7", 'SELECT model, brand, owner, price FROM phones WHERE owner=? LIMIT ?', ["Victoria", 5]);
        // getResultsForQuery("Ex7", 'SELECT model, brand, owner, price FROM phones WHERE owner=? AND brand=? LIMIT 5', ["Victoria", "Nokia"]);

        getResultsForQuery("Ex8", 'SELECT model, brand, owner, price FROM phones WHERE owner=? AND price < ? ORDER BY price DESC', ["Nina", 250]);

        // // Using nominative markers.
        getResultsForQuery("Ex1", 'SELECT model, brand, owner, price FROM phones WHERE owner=:owner', ["owner" => "Stacy"]);

        getResultsForQuery("Ex2", 'SELECT model, brand, owner, price FROM phones WHERE weight=:weight', ["weight" => 295]);

        getResultsForQuery("Ex3", 'SELECT model, brand, owner, price FROM phones WHERE brand=:brand', ["brand" => "Nokia"]);

        // getResultsForQuery("Ex4", 'SELECT model, brand, owner, price FROM phones WHERE brand="Nokia" OR brand="Apple"');
        getResultsForQuery("Ex4", 'SELECT model, brand, owner, price FROM phones WHERE brand IN (:brand1, :brand2)', ["brand1" => "Nokia", "brand2" => "Apple"]);

        getResultsForQuery("Ex5", 'SELECT model, brand, owner, price FROM phones WHERE price=:price', ["price" => 115]);

        getResultsForQuery("Ex6", 'SELECT model, brand, owner, price FROM phones ORDER BY weight LIMIT :limit', ["limit" => 10]);

        getResultsForQuery("Ex7", 'SELECT model, brand, owner, price FROM phones WHERE owner=:owner LIMIT :limit', ["owner" => "Victoria", "limit" => 5]);
        // getResultsForQuery("Ex7", 'SELECT model, brand, owner, price FROM phones WHERE owner=? AND brand=? LIMIT 5', null, ["Victoria", "Nokia"]);

        getResultsForQuery("Ex8", 'SELECT model, brand, owner, price FROM phones WHERE owner=:myOwner AND price < :myPrice ORDER BY price DESC', ["myPrice" => 250, "myOwner" => "Nina"]);

    ?>
    </ul>
</body>
</html>