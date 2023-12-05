let comboWrapper = null;
let comboInputElem = null;
let comboMatchesElem = null;
let comboSearchButton = null;

// Recreate with callbacks from construction.


// This function takes the following options as an object:
// inOptions: {
//      fetchStuff: <Function called as input is filled out.>
//      goodItem: <Function after combo functionality is complete and item details need to be shown.>
// }
//
// Returns:
// {
//     element: <New combo element to add to the DOM tree.>
//     matchesReceived: <Function to call after API gets results.>
// }
function createCombo(inOptions) {
    comboWrapper = document.createElement("div");
    comboWrapper.id = "combo";  // Not really needed for my code. Nice for others, tho.

    comboInputElem = document.createElement("input");
    comboInputElem.tabIndex = "1";
    comboInputElem.type = "text";
    comboInputElem.placeholder = "Search for what?";
    comboWrapper.appendChild(comboInputElem);

    comboMatchesElem = document.createElement("div");
    comboMatchesElem.id = "matches";
    comboWrapper.appendChild(comboMatchesElem);

    comboSearchButton = document.createElement("button");
    comboSearchButton.tabIndex = "2";
    comboSearchButton.innerHTML = "Search";

    comboWrapper.appendChild(comboSearchButton);

    activateCombo(inOptions);

    return {
        element: comboWrapper,
        matchesReceived,
        // matchesReceived: matchesReceived,  // Same as above.
    }
}

function activateCombo(inOptions) {
    comboInputElem.addEventListener("keyup", function (event) {
        // console.log("KEY EVENT:", event);
        if (event.key === 'Enter') {
            comboMatchesElem.style.display = "none";
            inOptions.goodItem(comboInputElem.value);  // CHANGE ME
        }
        else if (event.key === 'ArrowDown') {
            navItem(event);
        }
    });

    comboInputElem.addEventListener("input", function (event) {
        // console.log("INPUT", comboInputElem.value.length, comboInputElem.value, event);
        // Reset all the match results.
        comboMatchesElem.style.display = "none";
        comboMatchesElem.innerHTML = "";

        if (comboInputElem.value.length > 2) {  // Need at least 3 characters to start.
            inOptions.fetchStuff(comboInputElem.value);  // Use passed in function to get stuff.
        }
    });

    comboSearchButton.addEventListener("click", () => inOptions.goodItem(comboInputElem.value));
}

function matchesReceived(listOfStuff) {
    // console.log("MATCHES RECEIVED:", listOfStuff);
    listOfStuff.forEach((item, idx) => {
        const newDiv = document.createElement("div");
        newDiv.innerHTML = item;
        newDiv.tabIndex = (idx + 2) + "";  // The offset of 2 was to account for input and button

        newDiv.addEventListener("click", function () {
            selectItem(item);
        });

        newDiv.addEventListener("keyup", navItem);

        comboMatchesElem.appendChild(newDiv);
    });

    comboMatchesElem.style.display = "block";  // Show
}

function showItem() {
    comboMatchesElem.style.display = "none";
}

function selectItem(item) {
    comboMatchesElem.style.display = "none";
    comboInputElem.value = item;
    comboInputElem.focus();
}

function navItem(event) {
    const focusedElem = document.activeElement;  // The activeElement is the focused one.
    // The input or a matching item is currently focused...
    if (focusedElem && comboMatchesElem.style.display !== "none") {
        if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
            // const focusedElem = event.target;
            if (focusedElem.tabIndex) {
                let nextSchool = null;

                if (event.key === 'ArrowUp') {
                    nextSchool = document.querySelector(`[tabindex="${focusedElem.tabIndex - 1}"]`);
                }
                else {
                    // It's an ArrowDown
                    if (focusedElem.tabIndex === "1") {  // Go directly from input to list. Skip button.
                        nextSchool = document.querySelector(`[tabindex="3"]`);  // First match in list.
                    }
                    else {
                        nextSchool = document.querySelector(`[tabindex="${focusedElem.tabIndex + 1}"]`);
                    }
                }

                if (nextSchool) nextSchool.focus();
            }
        }
        else if (event.key === 'Enter') {
            selectItem(focusedElem.innerHTML)
        }
    }
}
