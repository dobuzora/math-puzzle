<?php
/*
 * Q02 : 数列の四則演算
 *
 * とっても時間がかかった...。
 * 色々検討した結果、正規表現で無理矢理変換した。
 * ① eval で数式計算する時は、return と ;　が必要（PHP構文じゃないとだめ）
 * ② 08 09 はエラー（0から始まると8進数となる。07までエラーが出なかったのはそういうこと）
 */

$num = 1000;
$op = ['*', ''];
# $op = ['*', '-', '+', ''];
while (true) {
    if ($num >= 10000) {
        break;
    }
    $num_str = (string)$num;
    foreach ($op as $i ) {
        foreach ($op as $j ) {
            foreach ($op as $k ) {
                $calc = $num_str[0] . $i . $num_str[1] . $j . $num_str[2] . $k .$num_str[3];
                $calc = preg_replace('|(\D)0+([1-9]\d?)|', '$1($2)', $calc);
                if (strlen($calc) == 4) {
                    continue;
                }
                $val = "return " . $calc . ";";;
                $ans = eval($val);
                if ((string)$num == strrev((string)$ans)) {
                    print $num . "\n";
                }
            }
        }
    }
    $num++;
}
