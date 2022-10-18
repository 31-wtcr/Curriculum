<?php
// 果物の名前と単価を設定
$fruits = ["リンゴ" => 100, "みかん" => 50, "もも" => 300];

// 個数の配列を設定
$number = ["リンゴ" => 3, "みかん" => 3, "もも" => 10];

// 合計値を計算する関数
function sum($unitPrice, $unitNumber)
{
    return $unitPrice * $unitNumber;
}

// 合計値計算の繰り返し処理
foreach ($fruits as $key => $value) {
    $totalPrice = sum($value, $number[$key]);
    echo "${key}は${totalPrice}円です。<br>";
}
