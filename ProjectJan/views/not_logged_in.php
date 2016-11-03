<?php

    session_destroy();
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
    session_start();
}
?>

<form method="post" action="login.php" name="loginform">

    <label for="login_input_username" style="float:left; margin-top:8px;">Username</label>
    <br>
    <br>
    <input id="login_input_username" class="form-control" style="width:60%;" type="text" name="user_name" required />
    <br>

    <label for="login_input_password" style="float:left; margin-top:8px;">Password</label>
    <br>
    <br>
    <input id="login_input_password" class="form-control" style="width:60%;" type="password" name="user_password" autocomplete="off" required />
    <br>
    <br>

    <input type="submit"  name="login" value="Log in" />

</form>
