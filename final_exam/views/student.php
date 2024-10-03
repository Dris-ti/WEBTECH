<?php
session_start();
require "../models/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/CSS/style.css">
    <script src="../views/JS/stScript.js"></script>
    <title>Student Page</title>
</head>

<body>
    <div class="st-outer-container">
        <div class="st-main-container">

            <div class="leaveApp-div">
                <form action="../controllers/leaveAction.php" method="POST" onsubmit="return leave_validation(this);">
                    <label for="teacher">Teacher Name: </label>
                    <select name="teacher" id="teacher">
                        <?php
                        $query = "SELECT * FROM account_info WHERE occupation = 'teacher';";
                        $db = new DbConnect();
                        $row = $db->GetData($query);

                        if (!$row) {
                            echo "Something went wrong!";
                        } else {
                            foreach ($row as $key => $value) {
                                echo "<option value='$value[id]'>$value[name]</option>";
                            }
                        }
                        ?>
                    </select>
                    <small id="teacherErr" class="error"></small>
                    <br><br>

                    <label for="leave-desc">Description: </label>
                    <textarea name="leave-desc"></textarea>
                    <small id="descErr" class="error"></small>
                    <br><br>

                    <input type="submit" value="Send" formaction="../controllers/leaveAction.php">
                    <small id="msg" name="msg"><?php echo !empty($_SESSION["msg"]) ? $_SESSION["msg"] : "" ?></small>
                    <br><br>
                    
                </form>
                <form action="../controllers/logout.php" method="POST">
                <input type="submit" value="Logout" formaction="../controllers/logout.php">
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>