<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 2019-01-30
 * Time: 19:19
 */

$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user == "admin"
    && $pass == "123456") {
    include("../daten/stockCatalogue.html");
} else {
    if (isset($_POST)) {
        ?>

        <form method="POST" action="passwordProtection.php">
            User <input type="text" name="user"></input><br/>
            Pass <input type="password" name="pass"></input><br/>
            <input type="submit" name="submit" value="Go"></input>
        </form>
    <?
    }
}
?>