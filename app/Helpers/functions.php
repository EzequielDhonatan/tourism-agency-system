<?php

use Carbon\Carbon;

function formatDateAndTime($value, $format = 'd/m/Y')
{
    return Carbon::parse($value)->format($format);
}