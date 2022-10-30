class Taiyaki {
    constructor(inside) {
        this.inside = inside;
    }
    show() {
        console.log(`中身は${this.inside}です`);
    }
}

let taiyaki = new Taiyaki("あんこ");
taiyaki.show();