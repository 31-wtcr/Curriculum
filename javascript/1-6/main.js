let scores = [10, 15, 20, 25];
console.log(scores);
for (let i = 0; i < scores.length; i++) {
    if (scores[i] % 2 === 0) {
        console.log(`${scores[i]}は偶数です`);
    }
}

let Car = {
    gass: 20.5,
    num: 1234
}
console.log(Car);
console.log(`ガソリンは${Car.gass}です`);
console.log(`ナンバーは${Car.num}です`);