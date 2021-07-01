<?php
require_once $_SERVER['DOCUMENT_ROOT'] .  '/examenoefening_jari_s/enviromental_variables.php';
require_once $_SERVER['DOCUMENT_ROOT'] . $project_path . '/code/database.php';
include $_SERVER['DOCUMENT_ROOT'] . $project_path . '/views/header.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
$db = new Database($db_username, $db_password);
    $db->login($_POST['email'], $_POST['password']);
}

?>

<form method="post">


    <div class="container">
        <label for="email"><b>email</b></label>
        <input type="email" placeholder="Enter email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
    </div>

    <button type="button" class="registerbtn"><a class="button_a" href="views/create_users.php" >register</a></button>
</form>



<?php
// include 'views/footer.php';
?>