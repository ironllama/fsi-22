<?php
    $bodyStr = file_get_contents('php://input');
    $inArr = json_decode($bodyStr, true);
    
    $thing = "fish";
    if (isset($inArr['fruit'])) $thing = htmlspecialchars($inArr['fruit']);

    $inDate = new DateTime('now');
    if (isset($inArr['expiration'])) $inDate = new DateTime(htmlspecialchars($inArr['expiration']));
    $expired = "expired. Do not eat.";
    if ($inDate > new DateTime('now')) $expired = "not expired, yet.";

    $returnArr = [ "message" => "Your $thing is $expired" ];  // JSON object to send back.
    echo json_encode($returnArr);  // To send back as JSON format, as well.