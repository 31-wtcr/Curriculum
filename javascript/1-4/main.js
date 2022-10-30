for (i = 1; i <= 100; i++) {
    if (i % 3 === 0 && i % 5 === 0) {
        console.log("FizzBuzz!!");
    } else if (i % 3 !== 0 && i % 5 === 0) {
        console.log("Buzz!");
    } else if (i % 3 === 0 && i % 5 !== 0) {
        console.log("Fizz!");
    } else {
        console.log(i);
    }
}

// switch文はswitchに式、caseに値を入れるため、下記のようなcaseで論理演算子は使えない。
// console.log("switch");

// for (i = 1; i <= 100; i++) {
//     switch (i) {
//         case (i % 3 === 0 && i % 5 === 0):
//             console.log("FizzBuzz!!");
//             break;
//         case (i % 3 !== 0 && i % 5 === 0):
//             console.log("Buzz!");
//             break;
//         case (i % 3 === 0 && i % 5 !== 0):
//             console.log("Fizz!");
//             break;
//         default:
//             console.log(i);
//             break;
//     }
// }