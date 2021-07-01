<?php
require_once $_SERVER['DOCUMENT_ROOT'] .  '/examenoefening_jari_s/enviromental_variables.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $project_path . '/code/database.php';
include $_SERVER['DOCUMENT_ROOT'] . $project_path . '/views/header.php';
// include 'header.php';
$db = new Database($db_username, $db_password);
$user_info = $db->show_user_info();
?>
