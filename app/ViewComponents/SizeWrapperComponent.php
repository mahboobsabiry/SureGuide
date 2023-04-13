<?php

namespace App\ViewComponents;

Class SizeWrapperComponent
{
    public static function sizeWrapper($size)
    {
        if ($size == '0') {
            echo 'N/A';
        } else if ($size == '1') {
            echo 'Small';
        } elseif ($size == '2') {
            echo 'Medium';
        } else {
            echo 'Large';
        }
    }
}