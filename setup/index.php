<?php
require_once '../code/database.php';
$db = new Database();   
$db->create_users();
?>