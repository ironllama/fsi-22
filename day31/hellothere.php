<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Can you hear me now?</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
            font-weight: bold;
            font-size: 4rem;
        }

        .square {
            width: 600px;
            height: 300px;
            border-radius: 10px;
            /* background-color: bisque; */
            background-color: cornflowerblue;
            color: white;
            transition: all 2s;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>

<body>
    <div class="square">It works! It's working! <?php echo "BOOYA!"; ?></div>
    <script>
        let squareElem = document.querySelector(".square");
        function showSquare() {
            squareElem.style.opacity = 1;
            setTimeout(hideSquare, 2000);
        }
        function hideSquare() {
            squareElem.style.opacity = 0;
            setTimeout(showSquare, 2000);
        }
        showSquare();
    </script>
</body>

</html>