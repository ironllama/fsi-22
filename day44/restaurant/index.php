<?php
require("controller/reservationController.php");

$URL_ROOT = "/day44/restaurant";

// Strip the $URL_ROOT from the URI
$requestURI = $_SERVER['REQUEST_URI'];
if (strpos($requestURI, $URL_ROOT) === 0) $requestURI = substr($requestURI, strlen($URL_ROOT));

// Log incoming requests!
file_put_contents("reserve.log", date('Y-m-d H:i:s') . " index.php: " . $requestURI . PHP_EOL, FILE_APPEND);

// Extract just the path, apart from the query params.
$urlPath = parse_url($requestURI)["path"];

switch ($urlPath) {
    case "/reserve":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);

            $rc = new ReservationController();
            $res = $rc->newReservation($data);

            $resStr = "";
            if ($res != 0) {
                $resStr = json_encode([ "status" => "OK", "code" => $res ]);
                http_response_code(200);
            }
            else {
                $resStr = json_encode([ "status" => "Error", "Message" => "Could not save your reservation."]);
                http_response_code(501);
            }
            echo $resStr;
        }
        break;
    case "/getReservation":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);

            $rc = new ReservationController();
            $res = $rc->getReservation($data);

            if ($res) {
                $resStr = json_encode($res);
                http_response_code(200);
            }
            else {
                $resStr = json_encode([ "status" => "Error", "Message" => "No matching reservation."]);
                http_response_code(404);
            }
            echo $resStr;
        }
        break;
    case "/changeReservation":
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);

            $rc = new ReservationController();
            $res = $rc->changeReservation($data);

            $resStr = "";
            if ($res != 0) {
                $resStr = json_encode([ "status" => "OK", "code" => $res ]);
                http_response_code(200);
            }
            else {
                $resStr = json_encode([ "status" => "Error", "Message" => "No matching reservation."]);
                http_response_code(404);
            }
            echo $resStr;
        }
        break;
    case "/cancelReservation":
        $data = [ "code" => $_GET['code'] ];

        $rc = new ReservationController();
        $res = $rc->cancelReservation($data);

        $resStr = "";
        if ($res != 0) {
            $resStr = json_encode([ "status" => "OK" ]);
            http_response_code(200);
        }
        else {
            $resStr = json_encode([ "status" => "Error", "Message" => "No matching reservation."]);
            http_response_code(404);
        }
        echo $resStr;
        break;
    case "/change":
        include("view/changePage.php");
        break;
    default:
        include("view/reservePage.php");
}