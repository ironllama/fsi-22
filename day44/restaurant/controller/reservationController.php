<?php
require("model/reservationModel.php");

class ReservationController {
    function newReservation($data) {
        $data['code'] = substr(md5(rand()), 0, 6);  // New random code for later retrieval by user.
        if ($this->validate($data)) {
            $rm = new ReservationModel();
            $res = $rm->save($data);
            return $data['code'];
        }
        else {
            return 0;
        }
    }

    function changeReservation($data) {
        if ($this->validate($data)) {
            $rm = new ReservationModel();
            $res = $rm->update($data);
            return $data['code'];
        }
        else {
            return 0;
        }
    }

    function validate($data) {
        if (!$data) return false;
        if ($data['timeslot'] === "" || new DateTime($data['timeslot']) < new DateTime()) return false;
        if ($data['fname'] === "") return false;
        if ($data['phone'] === "") return false;
        if ($data['numPeeps'] === "" || $data['numPeeps'] < 1) return false;
        if ($data['code'] === "") return false;

        return true;
    }
    
    function getReservation($data) {
        if ($data['code'] !== "") {
            $rm = new ReservationModel();
            return $rm->get($data);
        }
    }

    function cancelReservation($data) {
        if ($data['code'] !== "") {
            $rm = new ReservationModel();
            return $rm->delete($data);
        }
    }
}