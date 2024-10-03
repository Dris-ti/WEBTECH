<?php
session_start();
require "../models/dbConnect.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../views/JS/loginScript.js"></script>
    <link rel="stylesheet" href="../views/CSS/style.css">
    <title>Login</title>
</head>

<body>
    <div class="outer-container">
        <div class="main-container">

            <form action="../controllers/loginAction.php" method="POST" novalidate onsubmit="return login_validation(this)">
                <label for="id">ID : </label>
                <input type="text" id="id" name="id" value="<?php echo !empty($_SESSION["id"]) ? $_SESSION["id"] : "" ?>">
                <small id="idErr" name="idErr"></small>

                <br><br>

                <label for="password">Password : </label>
                <input type="password" id="password" name="password" value="<?php echo !empty($_SESSION["password"]) ? $_SESSION["password"] : "" ?>">
                <small id="passwordErr" name="passwordErr"></small>

                <br><br>

                <small id="Err" name="Err" value="<?php echo !empty($_SESSION["Err"]) ? $_SESSION["Err"] : "" ?>"></small>


                <input class="btn login" type="submit" value="Login" formaction="../controllers/loginAction.php">
            </form>
        </div>
    </div>
</body>

</html>