<?php
session_start();
require "../models/dbConnect.php";

if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $db = new DbConnect();
    $id = $_SESSION["id"];
    $teacherID = $db->text_validation($_POST["teacher"]);
    $leave_desc = $db->text_validation($_POST["leave-desc"]);
    $status = "pending";

    $_SESSION["descErr"] = "";

    if(empty($leave_desc))
    {
        $_SESSION["descErr"] = "Description cannot be empty";
        header("Location: ../views/student.php");
    }
    else
    {
        $query = "INSERT INTO leave_applications (`applied_by`, `applied_to`, `status`, `description`) VALUES ('$id','$teacherID','$status','$leave_desc')";

        $res = $db->executeData($query);
        if(!$res)
        {
            $_SESSION["msg"] = "Something went wrong";
            header("Location: ../views/student.php");
        }
        else
        {
            $_SESSION["msg"] = "Applied Successfully";
            header("Location: ../views/student.php");
        }
    }


}
?>
