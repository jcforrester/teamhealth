<?php

namespace Pyxl\Modules;

function arrayPush($array1, $array2)
{
    $array1[] = $array2;

    return $array1;
}