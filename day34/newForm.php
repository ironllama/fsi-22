<?php
    $errorStr = "";
    $display = [];
    $errors = [];
    $fields = ["gender", "fname", "lname", "age", "username", "password", "confirm", "country", "news"];
    foreach($fields as $field) {
        if (isset($_POST[$field])) {
            // NOTE: Typically, you leave the passwords and other data as-is, and just change anything
            // that you have being DISPLAYED going through htmlspecialchars or strip_tags. In this case
            // we're going to just display everything (vs. saving them in a db), so we're going to
            // process everything through htmlspecialchars.
            // $display[$field] = $_POST[$field];
            $display[$field] = htmlspecialchars($_POST[$field]);
            // $display[$field] = strip_tags($_POST[$field]);

            // TESTS!
            if ($field == "age" && !is_numeric($display[$field])) {
                $errors[] = "The $field needs to be a number.";
            }
            else if ($field == "password" && strlen($display[$field]) < 8) {
                $errors[] = "The $field needs to be at least 8 characters long.";
            }
        }
        else {
            $display[$field] = '';
            if ($_SERVER['REQUEST_METHOD'] == "POST") $errors[] = "The $field is required, but missing.";
        }
        $errorStr = implode("<br>", $errors);
    }
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        * {
            box-sizing: inherit;
        }

        html {
            font-size: 12px;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        form {
            padding: 3rem;
            border: 2px solid black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1rem;
        }

        h2 {
            margin: 0;
        }

        hr {
            margin: 0;
            width: 100%;
        }

        .inputWrapper {
            width: 100%;
            height: 2.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 1px solid lightgrey;
            border-radius: 3px;
            position: relative;
            padding: 0 0.5rem;
        }

        .radioWrapper label {
            font-size: 0.75rem;
        }

        .inputWrapper label {
            position: absolute;
            top: -0.25rem;
            left: 1rem;
            padding: 0 0.5rem;
            background-color: white;
            font-size: 0.5rem;
        }

        .inputWrapper input {
            width: 100%;
        }

        select {
            background-color: grey;
            width: 80%;
            height: 2rem;
        }

        [type=submit] {
            width: 100%;
            height: 3rem;
            font-size: 1.5rem;
            font-weight: bold;
            background-color: cornflowerblue;
            color: white;
            border: none;
        }

        [type=reset] {
            width: 100%;
            height: 3rem;
            font-size: 1.5rem;
            font-weight: bold;
            background-color: palevioletred;
            color: white;
            border: none;
        }

        .results {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
        }
    </style>
</head>

<body>
    <form action="newForm.php" method="POST">
        <h2>Sign in</h2>
        <hr>
        <div class="radioWrapper">
            <label for="gender">Man</label>
            <input type="radio" id="genderMan" name="gender" value="man" <?= $display['gender'] == 'man' ? 'checked' : '' ?>>
            <label for="gender">Woman</label>
            <input type="radio" id="genderWoman" name="gender" value="woman" <?= $display['gender'] =='woman' ? 'checked' : '' ?>>
        </div>
        <div class="inputWrapper">
            <label for="fname">First Name</label>
            <input id="fname" name="fname" value="<?= $display['fname'] ?>">
        </div>
        <div class="inputWrapper">
            <label for="lname">Last Name</label>
            <input id="lname" name="lname" value="<?= $display['lname'] ?>">
        </div>
        <div class="inputWrapper">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="<?= $display['age'] ?>">
        </div>
        <div class="inputWrapper">
            <label for="username">Login</label>
            <input id="username" name="username" value="<?= $display['username'] ?>">
        </div>
        <div class="inputWrapper">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?= $display['password'] ?>">
        </div>
        <div class="inputWrapper">
            <label for="confirm">Confirm</label>
            <input type="password" id="confirm" name="confirm" value="<?= $display['confirm'] ?>">
        </div>
        <div class="selectWrapper">
            <select id="country" name="country" value=<?= $display['country'] ?>>
                <option>South Korea</option>
                <option>North Korea</option>
                <option>West Korea</option>
            </select>
        </div>
        <div class="toggleNews">
            <input type="checkbox" id="news" name="news" <?= $display['news'] == 'on' ? 'checked' : '' ?>>
            <label for="news">I want to recieve the newsletter every month</label>
        </div>
        <input type="submit" value="Sign In">
        <input type="reset" value="Reset">
    </form>
    <div class="results">
        <?php
            if (strlen($errorStr) > 0) echo $errorStr;
            else {
                foreach($display as $k => $v) {
                    echo "<div>The value of $k is: $v</div>";
                }
            }
        ?>
    </div>
</body>

</html>