<?php
//connect.php
$server = 'itsql.fvtc.edu';
$username   = 'MachineWorx158';
$password   = 'MachineWorx158';
$database   = 'machineworx158';
 
if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($database))
{
    exit('Error: could not select the database');
}
?>