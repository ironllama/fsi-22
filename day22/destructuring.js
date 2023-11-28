const { allVehicles } = require('./cars3.js');

let fruit = ["apple", "lemon", "pear", "melon", ["pineapple", "crabapple"]];

console.log(fruit[0]);
console.log(fruit[1]);

let firstFruit = fruit[0];
let secondFruit = fruit[1];
console.log(firstFruit);

const [fUno] = fruit;
console.log("ONE:", fUno);
const [fruitOne, fruitTwo] = fruit;
console.log(fruitOne, fruitTwo);
const [fOne, fTwo, ...fWhateverYourHearDesires] = fruit;
console.log(fOne, fTwo, "REST:", fWhateverYourHearDesires);

const [f1, f2, f3, f4, [f5, f6]] = fruit;
const newFruit = [f1, f2, f3, f4, [f5, f6]];
newFruit[4].push("grannysmith");
console.log("ORIG:", fruit, "COPY:", newFruit);


const nissanMonster = {
    manufacturer: "Nissan",
    model: "Camry",
    fuel: "Electric",
    color: "lavender",
    productionYear: 2014,
    registrationNumber: "BV70ZMW",
};
let manu = nissanMonster.manufacturer;
let mod = nissanMonster.model;

const { manufacturer, model } = nissanMonster;
console.log("NISSAN: ", manufacturer, model);

const { manufacturer: manu2, model2 } = nissanMonster;
console.log("NISSAN: ", manu2, model);
const { productionYear: year, registrationNumber: reg } = nissanMonster;
console.log("NISSAN REG:", year, reg);

console.log("OBJHAS:", allVehicles[0].hasOwnProperty("productionYear"));
console.log("OBJHAS:", allVehicles[0].hasOwnProperty("size"));

let person = {
    name: "Esther"
};
person.hairColor = "black";
person["height"] = 7000;
console.log("PERSON:", person);

// {
//     "2014": {
//         "Nissan": 2,
//         "Honda": 1
//     },
//     "2015": {
//         "Nissan": 1,
//         "Honda": 4
//     },
// }
let cars = allVehicles;
let yearList = {};
for (let i = 0; i < cars.length; i++) {
    // let car = cars[i];
    // let manufacturer = car.manufacturer;
    // let productionYear = "" + car.productionYear;
    const { productionYear, manufacturer } = cars[i];

    // Create a sub-object (year), if it doesn't already exist.
    if (!yearList.hasOwnProperty(productionYear)) {  // Check if "year" does not exists in yearList
        yearList[productionYear] = {};  // Create one property, set to an empty object. (Will fill in later)
    }
    const manYear = yearList[productionYear];  // Convenient name to keep things shorter, easier to read.
    // console.log("MANYEAR:", manYear, manufacturer, productionYear, yearList);  // Debugging.

    // Create a sub-object (manYear), if it doesn't already exist.
    if (!manYear.hasOwnProperty(manufacturer)) {  // If manufacturer doesn't already exist for the year in question...
        manYear[manufacturer] = 0;  // Create a new property for the manufacturer, starting with zero (to be incremented later)
    }

    manYear[manufacturer] += 1;  // Increment the specific model for the specific year.


    // // let car = cars[i];
    // // let carMaker = car.manufacturer;
    // // let carYear = "" + car.productionYear;
    // const { productionYear: carYear, manufacturer: carMaker } = cars[i];

    // // Create a sub-object (year), if it doesn't already exist.
    // if (!yearList.hasOwnProperty(carYear)) yearList[carYear] = {};
    // const manYear = yearList[carYear];
    // // console.log("MANYEAR:", manYear, carMaker, carYear, yearList);  // Debugging.

    // // Create a sub-object (manYear), if it doesn't already exist.
    // if (!manYear.hasOwnProperty(carMaker)) manYear[carMaker] = 0;

    // manYear[carMaker] += 1;
}
console.log("YEARLIST:", yearList);

let weirdCar = {
    manufacturer: "Bugatti",
    model: "Focus",
    fuel: "Electric",
    color: "tan",
    productionYear: 1994,
    registrationNumber: "IN71IIR",
};

let fruitHana = "";
let fruitDool = "";
[fruitHana, fruitDool] = fruit;
console.log("FRUIT STUFF:", fruitHana, fruitDool);

let paintColor = "";
let fuel = "";
// When using destructuring assignment with OBJECTS, you have to wrap in parens.
({ color: paintColor, fuel } = weirdCar);
console.log("CAR STUFF:", paintColor, fuel);
