<?php
function getVolumeOfCylinder($radius, $height) {
    return (1/3) * M_PI * ($radius ** 2) * $height;
}

echo "The volume of a cone with radius 5 and height 2 is: " . round(getVolumeOfCylinder(5, 2));
