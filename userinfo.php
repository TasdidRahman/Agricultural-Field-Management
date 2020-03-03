<?php
session_start();
require 'database.php';

$id = $_SESSION['user_id'];

$records = $conn->prepare('SELECT name,designation,usertype FROM user WHERE user_id = :id');
$records->bindParam(':id', $id);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);

$nam=$results['name'];
$desi=$results['designation'];
$usertype=$results['usertype'];

?>