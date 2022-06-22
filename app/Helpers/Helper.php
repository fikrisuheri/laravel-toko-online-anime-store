<?php 

function rupiah($number)
{
    return "Rp " . number_format($number,0,',','.');
}