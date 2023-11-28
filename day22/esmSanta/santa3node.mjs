import { readFileSync } from 'fs';

let captcha = readFileSync("santa3node.txt", { encoding: 'utf-8' });
// console.log(captcha);

// console.log(captcha);
let total = 0;
for (let i = 0; i < captcha.length; i++) {
    let currChar = captcha[i];

    // Get next position. If next position is beyond end of string, next pos is first pos.
    let nextPos = i + 1;
    if (nextPos === captcha.length) nextPos = 0;
    let nextChar = captcha[nextPos];

    // Run test, and add if it passes.
    if (currChar === nextChar) total += parseInt(currChar);
}
console.log("PART1 TOTAL:", total);

// Part 2
total = 0;
let halfway = captcha.length / 2;
for (let i = 0; i < halfway; i++) {
    let currChar = captcha[i];

    // Get next position. If next position is beyond end of string, modulo!
    let nextPos = (i + halfway) % captcha.length;
    let nextChar = captcha[nextPos];

    // Run test, and add if it passes.
    if (currChar === nextChar) total += parseInt(currChar);
}
console.log("PART2 TOTAL:", total * 2);