<?php

while (list($key, $value) = each($arr)) {
    if (!($key % 2)) { // ignoriere gerade Werte
        continue(0);
    }
}