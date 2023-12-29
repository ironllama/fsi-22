<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/main.css">
    <style>
        section {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: var(--text-color);
            padding-bottom: 20px;
        }

        .code {
            gap: 2rem;
        }

        .code form {
            width: 20rem;
        }

        .code input {
            text-align: center;
        }

        .change {
            display: none;
        }

        .cancel-button {
            background: darkgrey;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <section class="code">
        <?php include("codeForm.php"); ?>
    </section>
    <section class="change">
        <?php include("reserveForm.php"); ?>
    </section>
    <div class="overlay overlay-change">
        <div class="overlay-card">
            <div class="overlay-card-title">Reservation updated!</div>
            Your reservation code is still the same:
            <div id="resCode"></div>
            Please save this code and use it when cancelling or changing your reservation.
        </div>
    </div>
    <div class="overlay overlay-cancel">
        <div class="overlay-card">
            <div class="overlay-card-title">Reservation cancelled!</div>
            We hope to see you again, soon!
        </div>
    </div>
    <div class="overlay overlay-error">
        <div class="overlay-card">
            <div class="overlay-card-title">No Reservation!</div>
            We can't seem to find a reservation with that code. Please check your code and try again.
        </div>
    </div>
    <script src="static/reserveCommon.js"></script>
    <script>
        const codeSection = document.querySelector(".code");
        const codeForm = document.querySelector(".code form");

        const changeSection = document.querySelector(".change");
        const changeForm = document.querySelector(".change form");

        const changeFormButton = document.querySelector(".change [type=submit]");
        changeFormButton.value = "CHANGE";

        const newCodeElem = document.createElement("input");
        newCodeElem.type = "hidden";
        newCodeElem.name = "code";
        changeForm.append(newCodeElem);

        const newFormRow = document.createElement("div");
        newFormRow.className = "form-row";
        const newCancelButton = document.createElement("input");
        newCancelButton.type = "button";
        newCancelButton.className = "cancel-button";
        newCancelButton.value = "CANCEL RESERVATION";
        newFormRow.append(newCancelButton);
        changeForm.append(newFormRow);
        const cancelButton = document.querySelector(".cancel-button");

        const overlayElem = document.querySelector(".overlay-change");
        const overlayCards = document.querySelectorAll(".overlay-card");
        const overlayResCode = document.querySelector("#resCode");
        const overlayCancel = document.querySelector(".overlay-cancel");
        const overlayError = document.querySelector(".overlay-error");

        handleSubmit(codeForm, "getReservation", res => {
            if (res.status && res.status == "Error") {
                overlayError.style.display = "flex";
            }
            else {
                for (const [key, val] of Object.entries(res)) {
                    if (changeForm.elements.hasOwnProperty(key)) {
                        changeForm.elements[key].value = val;
                    }
                    else console.log("CAN NOT FIND KEY:", key, val);
                }
                codeSection.style.display = "none";
                changeSection.style.display = "flex";
            }
        });

        handleSubmit(changeForm, "changeReservation", res => {
            if (res.status == "OK") {
                overlayResCode.innerHTML = res.code;
                overlayElem.style.display = "flex";
            }
        });

        cancelButton.addEventListener("click", e => {
            fetch("cancelReservation?code=" + newCodeElem.value)
            .then(res => res.json())
            .then(res => {
                overlayCancel.style.display = "flex";
            });
        });

        overlayCards.forEach(card => card.addEventListener("click", e => {
            history.go(-1);
        }));
    </script>
</body>
</html>