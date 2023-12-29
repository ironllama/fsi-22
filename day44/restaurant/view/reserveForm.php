<h3>Reservation</h3>
<form>
    <div class="form-row">
        <input type="datetime-local" name="timeslot" value="2023-12-31T23:00">
        <input type="text" name="fname" placeholder="Full Name" required value="George Jetson">
    </div>

    <div class="form-row">
        <input type="text" name="phone" placeholder="Phone Number" required value="010123456789">
        <input type="number" name="numPeeps" placeholder="How Many Persons?" min="1" required value="3">
    </div>

    <div class="form-row">
        <input type="submit" value="BOOK TABLE">
    </div>
</form>