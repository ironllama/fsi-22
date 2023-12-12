<?php

    if (!isset($_GET['colorHex'])) die("ERROR - Please send a valid color using hex values. (eg. colorHex=000000)");

    // Remove the leading '#', if exists. Note, that it is a URL-encoded '#', typically as %23
    if (str_starts_with($_GET['colorHex'], '#')) $_GET['colorHex'] = substr($_GET['colorHex'], 1);

    $red = substr($_GET['colorHex'], 0, 2);
    $green = substr($_GET['colorHex'], 2, 2);
    $blue = substr($_GET['colorHex'], 4, 2);

    $retRed = hexdec($red);
    $retGreen = hexdec($green);
    $retBlue = hexdec($blue);

    echo "$retRed, $retGreen, $retBlue";
