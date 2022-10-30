function createJuice(fruits) {
    console.log(`${fruits}を受け取りました。ジュースにして返します`);
    fruitsJuice = fruits + "ジュース";
    return fruitsJuice;
}

let orangeJuice = createJuice("みかん");
console.log(`${orangeJuice}が届きました`);