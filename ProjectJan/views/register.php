<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<form method="post" action="register.php" name="registerform">

    <label for="login_input_username"style="float:left; margin-top:8px;">Username (only letters and numbers, 2 to 64 characters)</label>
    <br>
    <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
    <br>

    <label for="login_input_email"style="float:left; margin-top:8px;">User's email</label>
    <br>
    <input id="login_input_email" class="form-control" type="email" name="user_email" required />
    <br>

    <label for="login_input_password_new"style="float:left; margin-top:8px;">Password (min. 6 characters)</label>
    <br>
    <input id="login_input_password_new" class="form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />
    <br>

    <label for="login_input_password_repeat"style="float:left; margin-top:8px;">Repeat password</label>
    <br>
    <input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <br>
    <input type="submit"  name="register" value="Register" />

</form>

