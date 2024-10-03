<?php
session_start();
require "../models/dbConnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../views/JS/history.js"></script>
    <link rel="stylesheet" href="../views/CSS/style.css">
    <title>Teacher</title>
</head>

<body>
    <div class="main-table">
        <table border="2px solid black">
            <thead>
                <tr>
                    <td>Leave ID</td>
                    <td>Applied By</td>
                    <td>Description</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT leave_applications.leave_id as `ID`, account_info.name as `Student Name`, leave_applications.description as `Description`, leave_applications.status as `Status` FROM leave_applications INNER JOIN account_info ON leave_applications.applied_by = account_info.id WHERE status = 'pending'";

                $db = new DbConnect();
                $row = $db->GetData($query);
                if (!$row) {
                    echo "<tr><td>No Data to show</td></tr>";
                } else {
                    foreach ($row as $key => $value) {
                        echo "
                            <td>" . $value["ID"] . "</td>
                            <td>" . $value["Student Name"] . "</td>
                            <td>" . $value["Description"] . "</td>
                            <td>" . $value["Status"] . "</td>
                            <td> 
                            <a href='../controllers/leaveAPP_accept.php?id=$value[ID]'>
                                <button class='action-btn delete-btn'>Accept</button>
                            </a>
                            <a href='../controllers/leaveAPP_delete.php?id=$value[ID]'>
                                <button class='action-btn edit-btn'>Delete</button>
                            </a>
                            
                             </td>
                            </tr>";
                    }
                }

                ?>
            </tbody>
        </table>

        <button id="toggleButton" onclick="hide()">History</button>

        <div class="historyDiv" >
            <table border="2px solid black">
                <thead>
                    <tr>
                        <td>Leave ID</td>
                        <td>Applied By</td>
                        <td>Description</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT leave_applications.leave_id as `ID`, account_info.name as `Student Name`, leave_applications.description as `Description`, leave_applications.status as `Status` FROM leave_applications INNER JOIN account_info ON leave_applications.applied_by = account_info.id WHERE status = 'accept'";

                    $db = new DbConnect();
                    $row = $db->GetData($query);
                    if (!$row) {
                        echo "<tr><td>No Data to show</td></tr>";
                    } else {
                        foreach ($row as $key => $value) {
                            echo "
                            <td>" . $value["ID"] . "</td>
                            <td>" . $value["Student Name"] . "</td>
                            <td>" . $value["Description"] . "</td>
                            <td>" . $value["Status"] . "</td> 
                            </tr>";
                        }
                    }

                    ?>
                </tbody>
            </table>
            
        </div>

        <form action="../controllers/logout.php" method="POST">
        <input type="submit" value="Logout" formaction="../controllers/logout.php">
        </form>
        
    </div>
</body>

</html>