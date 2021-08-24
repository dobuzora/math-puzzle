<?php
/*
 * Q1 : 10進数で回文
 *
 */

$num = 11;
while (true) {
    # 10進数 Check
    if ( (string)$num === strrev((string)$num)  &&
        decbin($num) === strrev(decbin($num)) &&
        decoct($num) === strrev(decoct($num)))  {
        print $num . "\n";
        break;
    }
    $num++;
}