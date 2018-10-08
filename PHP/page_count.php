/**
* How to use cookie to create page counter
*/

<?php

if (!isset($_COOKIE['visits'])) $_COOKIE['visits'] = 0;
$visits = $_COOKIE['visits'] + 1;
setcookie('visits',$visits,time()+3600*24*365);

if ($visits > 1) {
  echo("This is visit number $visits.");
} else { // First visit
  echo('Welcome to my Website! Click here for a tour!');
}

?>
