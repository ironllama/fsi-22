<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>TP : Interactive Form </title>
    <link rel="stylesheet" href="practical.css">
</head>

<body>

    <form id="myForm" method="POST" action="#">
        <h2>Sign in</h2>
        <div id='gender'>
            <input type="radio" name="gender" id="man" value="M" checked>
            <input type="radio" name="gender" id="woman" value="W">
            <label for="man" class="option man">
                <div class="dot"></div>
                <span>Man</span>
            </label>
            <label for="woman" class="option woman">
                <div class="dot"></div>
                <span>Woman</span>
            </label>

            <span class="tooltip">select a gender</span>
        </div>
        <p>
            <label class="floatLabel" for="lastName">LastName</label>
            <input name="lastName" id="lastName" type="text" />
            <span class="tooltip">A lastname cannot be less than 2 characters</span>
        </p>

        <p>
            <label class="floatLabel" for="firstName">Firstname</label>
            <input name="firstName" id="firstName" type="text" />
            <span class="tooltip">A firstname cannot be less than 2 characters</span>
        </p>

        <p>
            <label class="floatLabel" for="age">Age:</label>
            <input name="age" id="age" type="text" />
            <span class="tooltip">The age has to be between 5 and 140</span>
        </p>

        <p>
            <label class="floatLabel" for="login">Login</label>
            <input name="login" id="login" type="text" />
            <span class="tooltip">The login cannot be less than 4 characters</span>
        </p>
        <p>
            <label class="floatLabel" for="pwd1">Password</label>
            <input name="pwd1" id="pwd1" type="password" />
            <span class="tooltip">The password cannot be less than 6 characters</span>
        </p>
        <p>
            <label class="floatLabel" for="pwd2">Password (confirm)</label>
            <input name="pwd2" id="pwd2" type="password" />
            <span class="tooltip">The password confirmation has to be the same as the original one</span>
        </p>
        <div id="select">
            <div class="select-dropdown">
                <select name='country' id='country'>
                    <option value="none">Select your residence country</option>
                    <option value="uk">UK</option>
                    <option value="us">US</option>
                    <option value="kr">South Korea</option>
                </select>
                <span class="tooltip">You have to select your residence country</span>
            </div>
        </div>
        <div id="newsletter">
            <input type="checkbox" id="news" name="news" value="Ynews" /><label for="news">Toggle</label>
            I want to receive the newsletter every month</label>
        </div>

        <p>
            <button id='submit' type="submit">Sign In</button>
            <button id='reset' type="reset">Reset</button>
        </p>


        <div>
            <?php
            if (!empty($_POST)) {
                //Super secure - won't display any content if all the required fields are not provided
                if (!empty($_POST['gender']) and !empty($_POST['lastName']) and !empty($_POST['firstName']) and !empty($_POST['age']) and !empty($_POST['pwd1']) and !empty($_POST['pwd2']) and !empty($_POST['country'])) {

                    $valid_genders = ["man", "woman"];
                    $gender = (in_array($_POST['gender'], $valid_genders)) ? $_POST['gender'] : "You did not select a valid gender.";

                    $lastName = (strlen($_POST['lastName']) >= 2) ? htmlspecialchars($_POST['lastName']) : "You didn't enter a valid last name";

                    $firstName = (strlen($_POST['firstName']) >= 2) ? htmlspecialchars($_POST['firstName']) : "You didn't enter a valid first name";

                    $age = ((int)($_POST['age']) >= 5 and (int)($_POST['age']) <= 140) ? htmlspecialchars($_POST['age']) : "You didn't enter a valid age";

                    $login = (strlen($_POST['login']) >= 4) ?  htmlspecialchars($_POST['login']) : "You didn't fill a valid login";

                    $pwd  = "There is a problem with your password. Please register again";
                    if ((strlen($_POST['pwd1']) >= 6) and  ($_POST['pwd1'] == $_POST['pwd2'])) {
                        $pwdTreatment = htmlspecialchars($_POST['pwd1']);
                        $pwd =  "<span> Your password is a secret <span onclick=\"alert('Your pwd is : {$pwdTreatment}');\"><strong>click here</strong></span> to see it </span>";
                    }

                    $valid_countries = ["uk", "us", "kr"]; // TODO: Add new valid countries here
                    $country = ($_POST['country']) and in_array($_POST['country'], $valid_countries) ? $_POST['country'] : "You did not select a valid country.";

                    $newsLetter = (isset($_POST['news'])) ? "you will receive the newsletter" : "no newsletter for you";

            ?>
                    <div>
                        <p>Your gender is : <?= $gender; ?> </p>
                        <!-- php SHORT ECHO tags -->
                        <p>Your lastName is : <?= $lastName; ?> </p>
                        <p>Your firstName is : <?= $firstName; ?></p>
                        <p>Your age is : <?= $age; ?></p>
                        <p>Your login is : <?= $login ?></p>
                        <p><?= $pwd; ?></p>
                        <p>Your country is <?= $country; ?></p>
                        <p> newsletter activation ?<?= $newsLetter; ?></p>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </form>
    <!-- <script src="practical.js"></script> -->


</body>

</html>