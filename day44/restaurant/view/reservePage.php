<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reservation Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="static/main.css">
</head>

<body>
    <section class="banner">
        <h2>BOOK YOUR TABLE NOW</h2>
        <div class="card-container">
            <div class="card-img"></div>

            <div class="card-content">
                <?php include("reserveForm.php"); ?>
                <div class="form-row">
                    <a href="change" class="changeRes">Want to change an existing reservation?</a>
                </div>
            </div>
        </div>
    </section>
    <div class="overlay">
        <div class="overlay-card">
            <div class="overlay-card-title">Thank you!</div>
            Your reservation code is:
            <div id="resCode"></div>
            Please save this code and use it when cancelling or changing your reservation.
        </div>
    </div>
    <script src="static/reserveCommon.js"></script>
    <script>
        const requiredInputs = document.querySelectorAll(":required");
        const resForm = document.forms[0];
        const overlayElem = document.querySelector(".overlay");
        const overlayCard = document.querySelector(".overlay-card");
        const overlayResCode = document.querySelector("#resCode");

        handleSubmit(resForm, "reserve", res => {
            if (res.status == "OK") {
                overlayResCode.innerHTML = res.code;
                overlayElem.style.display = "flex";
            }
        });

        overlayCard.addEventListener("click", e => {
            overlayElem.style.display = "none";
        });
    </script>
</body>

</html>