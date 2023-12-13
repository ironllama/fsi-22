<?php
    if (!isset($_GET['input'])) die("ERROR - Please send a valid input.");

    echo "
            document.body.style.backgroundColor = 'red';

            let overlay = document.createElement('div');
            overlay.style.cssText = 'position:absolute;top:0;right:0;bottom:0;left:0;height:100vh;width:100vw;font-size:5rem;color:green;display:flex;justify-content:center;align-items:center;text-align:center;';
            overlay.innerHTML = 'MERRY CHRISTMAS';

            document.body.appendChild(overlay);
    ";