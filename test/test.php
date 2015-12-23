<?php
include("../Database/UserDAO.php");
$listUser = UserDAO::getAllUser(3,2);

$username="UUU9";
$password="PPP9";
$created_date = "2013-04-02";
$role = "ROLE_USER";
$result = UserDAO::deleteUser(19);
var_dump("AAA: ".$result.'------'.json_encode($listUser));
?>
