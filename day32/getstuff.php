<?php
$message = "Hello, there. This is the default.";
if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET['message']);
}

$weather = "Hello, there. This is the default.";
if (isset($_GET['weather'])) {
    $weather = htmlspecialchars($_GET['weather']);
}

$number = "Hello, there. This is the default.";
if (isset($_GET['number'])) {
    $number = htmlspecialchars($_GET['number']);
}

$allFordsStr = file_get_contents("ford_escort.csv");
$allFords = explode("\n", trim($allFordsStr));

$allPrices = [];
for ($i = 1; $i < count($allFords); $i++) {
    $fordLine = $allFords[$i];
    $price = explode(",", str_replace(" ", "", $fordLine))[2];
    $allPrices[] = $price;
}
$averagePrice = array_sum($allPrices) / count($allPrices);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Stuff</title>
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
            font-weight: bold;
            font-size: 2rem;
            gap: 1rem;
        }
        .temp {
            font-size: 6rem;
        }
        .type {
            font-size: 4rem;
        }
    </style>
</head>
<body>
    <div class="temp"><?= $number; ?></div>
    <div class="type"><?= $weather; ?></div>
    <div><?php echo $message; ?></div>
    <div>Average price for a Ford Escort: <?php echo $averagePrice; ?></div>
    <ul>
        <?php
            foreach ($allPrices as $p) {
                // echo "<li>".$p."</li>";
                ?>
                <li><?= $p ?></li>
                <?php
            }
        ?>
    </ul>
    <script>
        let message = "<?= $message ?>";
        <?php
            echo "for(let i = 0; i < 10; i++) console.log(\"WUT\");";
            echo "document.querySelector('.temp').style.color='red';";
        ?>
    </script>
</body>
</html>