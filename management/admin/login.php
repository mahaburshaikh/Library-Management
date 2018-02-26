<?php
if (isset($_POST['form_login'])) {
    try {
        if (empty($_POST['username'])) {
            throw new Exception('username can not be empty');
        }
        if (empty($_POST['password'])) {
            throw new Exception('username can not be empty');
        }
        $password = $_POST['password'];
        $password = md5($password);

        include ('../config.php');
        $num = 0;
        $statement = $db->prepare("select * from tbl_loginm where username=? and password=?");
        $statement->execute(array($_POST['username'], $password));
        $num = $statement->rowCount();
        if ($num > 0) {
            session_start();
            $_SESSION['name'] = "admin";
            header("location: home.php");
        } else {
            throw new Exception('valid username or password');
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>login-sample blog</title>
        <link rel="stylesheet" href="../style-admin.css">
    </head>
    <body>
        <table border="1px solid #000000" style="text-align: center;margin-left: 300px;margin-top: 100px;background: #9c2222" width="50%">
                <tr>
                    <td>
                        <div id="wrapper-login">
            <h1>Admin Login</h1>

            <?php
            if (isset($error_message)) {
                echo "<div class='error'>" . $error_message . "</div>";
            }
            ?>
           
            <form action="" method="post">
                <table>
                        <tr>
                            <td>Username</td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Login" name="form_login"></td>
                            </td>
                        </tr>
                    </table>          
                </form>
                </tr>
            </table>
        </div>
    </body>
</html>
