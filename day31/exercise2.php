<?php

// ==============================
echo "========= QUESTION 1 =========";
// ==============================
echo "<br>";
$ages = array(12, 23, 30, 56, 140);
//or
$ages[0] = 12;
$ages[1] = 23;
$ages[2] = 30;
$ages[3] = 56;
$ages[4] = 140;

// or
$ages[] = 12;
$ages[] = 23;
$ages[] = 30;
$ages[] = 56;
$ages[] = 140;

// ==============================
echo "========= QUESTION 2 =========";
// ==============================
echo "<br>";
$group1 = array(
    'language' => 'French',
    'day_class' => 'Monday',
    'is_already_started' => true,
    'nb_of_students' => 15
);

echo $group1['language'];
echo "<br>";

// or
$group2['language'] = 'English';
$group2['day_class'] = 'Tuesday';
$group2['is_already_started'] = false;
$group2['nb_of_students'] = 8;

echo $group2['is_already_started'];

echo "<br>";
// ==============================
echo "========= QUESTION 3 =========";
// ==============================
echo "<br>";
$colors = ['blue', 'red', 'pink', 'green', 'white', 'orange', 'black', 'purple', 'yellow', 'grey'];

$c = count($colors);
for ($i = 0; $i < $c; $i++) {
    echo "The color at index $i is $colors[$i]<br>";
}


echo "<br>";
// ==============================
echo "========= QUESTION 4 =========";
// ==============================
echo "<br>";
$colors = ['blue', 'red', 'pink', 'green', 'white', 'orange', 'black', 'purple', 'yellow', 'grey'];

foreach ($colors as $index => $color) {
    echo "The color at index $index is $color<br>";
}

echo "<br>";
// ==============================
echo "========= QUESTION 5 =========";
// ==============================
echo "<br>";
$coords = [
    array(
        "x" => 1,
        "y" => 4,
        "z" => 6
    ),
    array(
        "x" => 4,
        "y" => 8,
        "z" => 0
    ),
    array(
        "x" => 6,
        "y" => 56,
        "z" => 12
    ),
    array(
        "x" => 12,
        "y" => 23,
        "z" => 3
    ),
    array(
        "x" => 15,
        "y" => 8,
        "z" => 67
    ),
    array(
        "x" => 2,
        "y" => 4,
        "z" => 2
    ),
    array(
        "x" => 3,
        "y" => 9,
        "z" => 8
    ),
    array(
        "x" => 7,
        "y" => 12,
        "z" => 32
    ),
    array(
        "x" => 8,
        "y" => 34,
        "z" => 1
    ),
    array(
        "x" => 2,
        "y" => 0,
        "z" => 5
    )
];

foreach ($coords as $index => $coord) {
    echo "Point #$index<br>";
    echo "~~~~~~<br>";
    foreach ($coord as $axis => $value) {
        echo "The $axis axis is equal to $value <br>";
    }
    // echo "The x axis is equal to {$coord['x']} <br>";
    // echo "The y axis is equal to {$coord['y']} <br>";
    // echo "The z axis is equal to {$coord['z']} <br>";
    echo "<br>";
}

// QUESTION 5 - VERSION 2
$data_points = array(
    "x" => [1, 4, 6, 12, 15, 2, 3, 7, 8, 2],
    "y" => [4, 8, 56, 23, 8, 4, 9, 12, 34, 0],
    "z" => [6, 0, 12, 3, 67, 2, 8, 32, 1, 5]
);

for ($i = 0; $i < count($data_points["x"]); $i++) {
    echo "Point #$i<br>";
    echo "~~~~~~<br>";
    // V1
    // echo "The x axis is equal to {$data_points['x'][$i]}<br>";
    // echo "The y axis is equal to {$data_points['y'][$i]}<br>";
    // echo "The z axis is equal to {$data_points['z'][$i]}<br>";
    // V2
    foreach ($data_points as $axis => $value) {
        echo "The $axis axis is equal to $value[$i] <br>";
    }
    echo "<br>";
}

// EXAMPLE
$student_names = ["Roy", "Orkhan", "Graham"];
$student_ages = [19, 24, 36];
$student_favorite_foods = ["kimbap", "pizza", "pizza"];

$students = [
    array(
        "name" => "Roy",
        "age" => 19,
        "favorite_food" => "kimbap"
    ),
    array(
        "name" => "Orkhan",
        "age" => 24,
        "favorite_food" => "pizza"
    ),
    array(
        "name" => "Graham",
        "age" => 36,
        "favorite_food" => "pizza"
    ),
];