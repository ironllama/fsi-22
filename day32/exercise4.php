Exercise 4 answers
<?php
$text = "Praesent id finibus nisi. Ut eu porttitor diam, ut vestibulum tortor. Donec interdum a libero eget blandit. Pellentesque consectetur aliquet fringilla. Nulla facilisi. Maecenas vehicula eget elit eget tempus. Pellentesque lectus dolor, maximus eu leo et, imperdiet vehicula dolor. Cras eros tellus, viverra id odio non, elementum sollicitudin nulla. Morbi euismod, eros vitae porta venenatis, elit ipsum dictum elit, ac aliquet diam enim non lacus. Praesent id purus orci. Ut tortor nunc, porta ut ligula vitae, egestas laoreet felis. Quisque quis elit sit amet sapien sollicitudin posuere cursus sit amet sem. Suspendisse sollicitudin, mauris a vestibulum mattis, nisl lacus ullamcorper erat, at fermentum justo ligula vitae dui. Aliquam placerat arcu lectus, convallis consectetur eros tincidunt at. Aenean interdum vehicula dapibus. Nulla turpis odio, feugiat quis ultricies pellentesque, maximus eget risus.

Mauris viverra bibendum nisl ac malesuada. Pellentesque accumsan massa at lectus consequat, id auctor diam pellentesque. Vivamus congue nec ante non consequat. Morbi at velit quis est consectetur placerat. Duis ac purus est. Donec eget sapien velit. Praesent at tempor nulla, eu placerat nunc. In consectetur leo sit amet tortor ultricies, in eleifend tellus auctor. Etiam quis urna pulvinar, auctor elit eget, scelerisque nisi.

Aenean turpis erat, elementum venenatis libero vitae, accumsan vehicula justo. Donec elementum ultrices magna, sed porttitor tellus convallis quis. Donec cursus eros sit amet felis volutpat, vel vestibulum purus aliquam. Fusce mattis consectetur nulla, quis tincidunt nisl venenatis nec. Fusce id tincidunt lacus. Nunc ultricies consequat ante id laoreet. Mauris varius luctus diam non varius. Duis placerat aliquet mollis. Nullam at sapien nec orci fringilla dictum ut sed ipsum. In eu nisi pulvinar neque euismod blandit non ac dui. Proin scelerisque, odio vel mollis egestas, tellus tortor porttitor enim, eget tincidunt sapien quam sed ligula. Nam eu lectus vel nisi lacinia blandit eget eget enim. Phasellus a augue tempus, dictum orci nec, convallis lorem. Ut tincidunt dapibus felis nec cursus.

Donec fermentum mollis nisi, sodales dapibus velit. Vivamus cursus erat interdum nisl gravida convallis sed eu orci. Donec vel ex fringilla, iaculis sem at, tincidunt sapien. Vivamus nibh odio, dapibus in ornare a, feugiat vitae massa. Maecenas ullamcorper consequat nunc a semper. Etiam maximus, lacus eu ornare mattis, ligula erat gravida urna, eget convallis urna orci sit amet magna. Duis bibendum dolor a eros sagittis, eget iaculis metus suscipit.

Sed ante tellus, imperdiet eu bibendum vel, facilisis in orci. Sed turpis erat, auctor volutpat velit non, accumsan accumsan enim. Nam ultricies finibus mi, ut facilisis diam cursus at. Suspendisse et augue nec augue vulputate eleifend quis id lectus. Nunc eu eros est. Nullam nec felis et nibh rhoncus ultricies. Duis sed faucibus sapien. Sed mi dolor, tempor in suscipit nec, tristique et enim. Donec vitae molestie felis. Phasellus lobortis auctor risus, sit amet eleifend lectus consectetur ac. Duis nec nunc tortor. Etiam interdum ipsum neque, id bibendum eros commodo tempor. Proin eget justo nec ipsum bibendum mollis in in velit. Fusce ac ligula vitae tellus ultrices facilisis. Sed massa nunc, cursus eget dignissim quis, ornare vitae.";

$lines = explode("\n\n", $text);
$words = explode(" ", str_replace("\n\n", " ", $text));
echo count($lines) . " paragraphs, " . count($words) . " words, " . strlen(str_replace("\n\n", "", $text)) . " characters generated.\n";

echo strtoupper($text);
echo strtolower($text);
echo str_replace("diam", "BANANAAAA", $text);
echo str_replace("e", "z", $text);

$today = date("l");
echo $today;

$today = date('l \\t\h\\e jS');
echo $today;

$today = date("F j, Y, g:i a"); // March 10, 2001, 5:16 pm
echo $today;

$today = date("m.d.y"); // 03.10.01
echo $today;

$today = date("D M j G:i:s e Y"); // Sat Mar 10 17:16:18 Asia/Seoul 2001
echo $today;

$today = date("Y-m-d H:i:s"); // 2001-03-10 17:16:18 (DATETIME of MySQL)
echo $today;