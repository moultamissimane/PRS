<?php

if (isset($_POST['cancel'])) {
    header("Location: index.php");
    return;
}

$salt = 'XyZzy12*_';
$stored_hash = 'a8609e8d62c043243c4e201cbb342862';

$failure = false;

if (isset($_POST['who']) && isset($_POST['pass'])) {
    if (strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1) {
        $failure = "User name and password are required";
    } else {
        $check = hash('md5', $salt . $_POST['pass']);
        if ($check == $stored_hash) {
            header("Location: Rsp.php?name=" . urlencode($_POST['who']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <?php require_once "bootstrap.php"; ?>
    <title>Check Imane's Login Page</title>
</head>

<body style="background-color: black;">
    <div class="container">
        <h1 style="display: flex; justify-content: center; margin-top: 60px; color: white; ">Log In To Play</h1>
        <?php
        if ($failure !== false) {
            echo ('<p style="color: red;">' . htmlentities($failure) . "</p>\n");
        }
        ?>
        <form method="POST">
            <div style="background-color: gainsboro; border-radius: 20px; padding: 40px;">
                <div style="display: flex; justify-content: center; ">
                    <label  for="nam">User Name:</label>
                    <input style="border-radius: 20px; margin-top: 20px; border-color: red; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;" type="text" name="who" id="nam"><br />
                </div>
                <div style="display: flex; justify-content: center; margin-top: 20px;">
                <label for="id_1723">Password:</label>
                <input style="border-radius: 20px; border-color: red; margin-top: 20px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;" type="text" name="pass" id="id_1723"><br />
                </div>
                <div style="display: flex; justify-content: center; margin-top: 20px;">
                <input style="background-color: black; color: white; border-radius: 10px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;" type="submit" value="Log In">
                <input style="background-color: black; margin-left: 20px; color: white; border-radius: 10px; padding-left: 10px; padding-right: 10px; padding-top: 5px; padding-bottom: 5px;" type="submit" name="cancel" value="Cancel">
                </div>
            </div>
        </form>
        <!-- <p>
            For a password hint, view source and find a password hint
            in the HTML comments. -->
            <!-- Hint: The password is the four character sound a cat
makes (all lower case) followed by 123. -->
        <!-- </p> -->
    </div>
</body>