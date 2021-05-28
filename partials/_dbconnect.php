<?php
$server="localhost";
$username="root";
$password="";
$datbase="users85";

$conn=mysqli_connect($server,$username,$password,$datbase);
if(!$conn)
{
//     echo"Succes";
// }
// else
// {
    die("Error".mysqli_connect_error());
}

?>