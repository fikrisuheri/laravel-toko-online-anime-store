<?php 

function rupiah($number)
{
    return "Rp " . number_format($number,0,',','.');
}

function tanggal($tanggal){
    return \Carbon\Carbon::parse($tanggal)->format('d F Y');
}