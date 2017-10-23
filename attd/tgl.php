<?php
/**
 * Created by PhpStorm.
 * User: Segy Hendro P
 * Date: 29 Mar 2017
 * Time: 15:36
 */

$time = date('29 Mar 2017');
$timestamp = strtotime($time); //1072915200
$hehe = date('d M Y', $timestamp);

// this prints the year in a two digit format
// however, as this would start with a "0", it
// only prints "4"
//echo idate('y', $timestamp);
echo "<br>";
//echo $timestamp;
echo "<br>";
//echo $time;
echo "<br>";
//echo $hehe
date_default_timezone_set('Asia/Jakarta');
$lol = date('d M Y');
echo $lol;
echo '<br>';
$lol  = strtotime($lol);
$test = $lol;
echo $test;
$tet =  date('d M Y', $test);
echo '<br>';
echo $tet;
echo '<br>';

echo '<br>';echo '<br>';echo '<br>';
$due = ('30 April 2017');
$due1 = strtotime($due);
echo $due . "<br>";
echo $due1 . "<br>";
$deadline = ($due1-$lol)/86400;
echo $deadline . "<br>";

if ($deadline >0)
{
    echo "Still going";
}
else{
    echo "Late shit";
}
 echo '<br>';
$time =  $_SERVER['REQUEST_TIME'];
echo $time . "<br>";
$time2 =  date('d M Y , H:i:s', $time);
echo $time2 . "<br>";

$tired = strtotime(date('d M Y, H:i:s'));
$tired2 = date('d M Y, H:i:s', $tired );

echo $tired . "<br>";
echo $tired2 . "<br>";
?>