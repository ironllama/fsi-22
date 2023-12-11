<?php
$my_age = 10;
$name = "Marie";
$country = "Korea";
$isWoman = true;

if($my_age < 3) {
    echo "You are really young... just only ". $my_age ." years old.\n";
}
else {
    echo 'it\'s okay you can continue on this web page, '.$name.PHP_EOL;
}

if($name == "Marie" && $country == "Korea") {
    echo "Welcome to " .$country. ', ' .$name.PHP_EOL;
}

if(!$isWoman OR $name !== "Marie" ) {
    echo "Who are you?\n";
}
else echo "Let's do this!\n";

$level = 92;
if ($level >= 250) echo "Very high pollution → stay at home !";
else if ($level >= 210) echo "Very High pollution → stay at home !";
else if ($level >= 180) echo "High pollution →  wear a mask and no activities outside";
else if ($level >= 140) echo "Medium pollution → wear a mask";
else if ($level >= 110) echo "Medium pollution → wear a mask";
else if ($level >= 90) echo "Little pollution → wear a mask";
else if ($level >= 50) echo "Little pollution";
else if ($level >= 20) echo "No pollution";
else if ($level >= 0) echo "No pollution";
else echo "no data entries - Do what you want !";
echo PHP_EOL;

switch($level) {
    case $level >= 250:
        echo "Very high pollution → stay at home !";
        break;
    case $level >= 210:
        echo "Very High pollution → stay at home !";
        break;
    case $level >= 180:
        echo "High pollution →  wear a mask and no activities outside";
        break;
    case $level >= 140:
        echo "Medium pollution → wear a mask";
        break;
    case $level >= 110:
        echo "Medium pollution → wear a mask";
        break;
    case $level >= 90:
        echo "Little pollution → wear a mask";
        break;
    case $level >= 50:
        echo "Little pollution";
        break;
    case $level >= 20:
        echo "No pollution";
        break;
    default:
        echo "No pollution";
}
echo PHP_EOL;


// $password = "banana";
// if($password == "banana") {
//     echo "you have the good password ". $password ."you can enter";
// }
// else {
//     echo "Wrong password, you can't enter";
// }

$password = "banana";
echo $password == "banana"
    ? "You have a good password: " . $password . ". You can enter."
    : "Wrong password. You can't enter";


// $isEmployed = false;
// echo $status = $isEmployed ? "you have a job" : "no job";

$isEmployed = false;
if ($status == $isEmployed) echo "You have a job!";
else echo "No job.";
