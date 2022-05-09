<?php

$host = "localhost"; //127.0.0.1
$user = "id17516230_csis24400";
$password = "f6\5Tw?z%u2bYGx}"; //if you are using my instance this should work for you, if not you need to know the connection password
$dbname = "id17516230_csis2440";
$con = new mysqli($host, $user, $password, $dbname)
        or die('Could not connect to the database server.  ' . mysqli_connect_error($con));

function mysql_fix_string($conn, $string) {
    if (get_magic_quotes_gpc()) {
        $string = stripslashes($string);
    }
    $string = htmlentities($string);
    return $conn->real_escape_string($string);
}
