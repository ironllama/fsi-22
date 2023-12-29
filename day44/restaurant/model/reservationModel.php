<?php
require_once("model.php");

class ReservationModel extends Model {
    function save($data) {
        $stmt = $this->db->prepare('INSERT INTO reservation (timeslot, fullname, contact, numpeeps, code) VALUES (:timeslot, :fullname, :contact, :numpeeps, :code)');
        $stmt->execute([
            'timeslot' => $data['timeslot'],
            'fullname' => $data['fname'],
            'contact' => $data['phone'],
            'numpeeps' => $data['numPeeps'],
            'code' => $data['code'],
        ]);
        return $stmt->rowCount();
    }

    function get($data) {
        $stmt = $this->db->prepare('SELECT timeslot, fullname, contact, numpeeps FROM reservation WHERE code=:code AND is_active=1');
        $stmt->execute([ 'code' => $data['code'] ]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res) {
            $retVal = [];  // Create and prepare return data. (Fields differ from database.)
            $retVal['timeslot'] = $res['timeslot'];
            $retVal['fname'] = $res['fullname'];
            $retVal['phone'] = $res['contact'];
            $retVal['numPeeps'] = $res['numpeeps'];
            $retVal['code'] = $data['code'];
            return $retVal;
        }

        return $res;  // Return the false if there are not results.
    }

    function update($data) {
        $stmt = $this->db->prepare('UPDATE reservation SET timeslot=:timeslot, fullname=:fullname, contact=:contact, numpeeps=:numpeeps WHERE code=:code AND is_active=1');
        $stmt->execute([
            'timeslot' => $data['timeslot'],
            'fullname' => $data['fname'],
            'contact' => $data['phone'],
            'numpeeps' => $data['numPeeps'],
            'code' => $data['code'],
        ]);
        return $stmt->rowCount();
    }

    function delete($data) {
        $stmt = $this->db->prepare('UPDATE reservation SET is_active=0 WHERE code=:code AND is_active=1');
        $stmt->execute([ 'code' => $data['code'] ]);
        return $stmt->rowCount();
    }
}