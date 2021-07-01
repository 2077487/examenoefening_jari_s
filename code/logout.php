<?php require_once $_SERVER['DOCUMENT_ROOT'] .  '/examenoefening_jari_s/enviromental_variables.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $project_path . '/code/database.php';
$db = new Database($db_username, $db_password);
session_start();
unset($_SESSION['logged_in_as'], $_SESSION['is_admin']);
header('Location: /examenoefening_jari_s/index.php')
?>