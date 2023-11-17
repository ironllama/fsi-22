// console.log("Hello, there!");

// Generate a random floating point number between 0 and 1.
// const randomNum = Math.random();
// console.log(randomNum);

// const indexedRandom = randomNum * 20;  // Index that random, like a %
// console.log(indexedRandom);

/*
    We round the number to get rid of the numbers
    to the right of the floating point.
*/
// const roundedIndexRandom = Math.round(indexedRandom);
// console.log(roundedIndexRandom);


const numHeadsOrTails = Math.round(Math.random());
console.log(numHeadsOrTails);

let userChoice = prompt("Guess 0 for HEADS or 1 for TAILS!");
userChoice = parseInt(userChoice);

// if (userChoice == numHeadsOrTails) console.log("You win!");
// else if (userChoice != numHeadsOrTails) console.log("You lose.");
// else console.log("You're stupid.");

// Option 1. First, check all valid combinations.
if (userChoice === 0 && numHeadsOrTails === 0) {
    console.log("Correct - HEADS");
}
else {
    if (userChoice === 1 && numHeadsOrTails === 1) {
        console.log("Correct - TAILS");
    }
    else {
        if (userChoice === 0 && numHeadsOrTails === 1) {
            console.log("Wrong - TAILS");
        }
        else {
            if (userChoice === 1 && numHeadsOrTails === 0) {
                console.log("Wrong - HEADS");
            }
            else {  // None of the above valid combinations, then assume bad input.
                console.log("Type in a valid input.");
            }
        }
    }
}


// Option 2.
// First check to see if the input is valid.
if (userChoice !== 0 && userChoice !== 1) {
    console.log("Wrong input.");
}
else {
    // And then check to see if it's a winning combo.

    // Create a string representation of the numHeadsOrTails.
    // We can confidently assume numHeadsOrTails will ONLY be 0 or 1, ie. only 2 possible things.
    // So, we can set it to one, and if it's not right, set it to the other thing. (Save ourselves 1 test.)
    let strHeadsOrTails = "HEADS";
    if (numHeadsOrTails === 1) {
        strHeadsOrTails = "TAILS";
    }

    // Run the tests, and produce the appropriate outputs.
    if (userChoice === numHeadsOrTails) {
        console.log("WIN - " + strHeadsOrTails);
    }
    else {
        console.log("LOSE - " + strHeadsOrTails);
    }
}