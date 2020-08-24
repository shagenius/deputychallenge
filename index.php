<?php
include 'classes/Role.php';
include 'classes/User.php';
include 'classes/UserRole.php';

$userRole = new UserRole();

$userRole->setRoles(Role::$roles);
$userRole->setUsers(User::$users);


$subordinates3 = $userRole->getSubordinates(3);

$output1 = json_encode($subordinates3);

echo "getSubOrdinates(3) : " . $output1;

$subordinates1 = $userRole->getSubordinates(1);

$output2 = json_encode($subordinates1);

echo "<br/>" . "getSubOrdinates(1) : " . $output2;
