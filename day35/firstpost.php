<?php
    print_r($_POST);
    
    $thing = "fish";
    if (isset($_POST['fruit'])) $thing = htmlspecialchars($_POST['fruit']);

    $inDate = new DateTime('now');
    if (isset($_POST['expiration'])) $inDate = new DateTime(htmlspecialchars($_POST['expiration']));
    $expired = "expired. Do not eat.";
    if ($inDate > new DateTime('now')) $expired = "not expired, yet."
?>

<div>Your <?= $thing ?>  is <?= $expired ?></div>