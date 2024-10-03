<?php
session_start();
require "../models/dbConnect.php";


if($_SERVER["REQUEST_METHOD"] === "POST")
{
    $db = new DbConnect();

    $id = $db->text_validation($_POST["id"]);
    $password = $db->text_validation($_POST["password"]);

    $_SESSION["id"] = "";
    $_SESSION["password"] = "";
    $_SESSION["idErr"] = "";
    $_SESSION["passwordErr"] = "";
    $_SESSION["Err"] = "";
    $isValid = true;


    if(empty($id))
    {
        $_SESSION["idErr"] = "Please enter your ID";
        $isValid = false;
    }
    else
    {
        $_SESSION["id"] = $id;
    }

    if(empty($password))
    {
        $_SESSION["passwordErr"] = "Please enter your password";
        $isValid = false;
    }
    else
    {
        $_SESSION["password"] = $password;
    }

    if($isValid)
    {
        $query = "SELECT * FROM account_info WHERE id = '$id'";

        $user = $db->getData($query);

        if(!$user)
        {
            $_SESSION["Err"] = "Account not found.";
            header("Location: ../views/login.php");
        }
        else
        {
            if($user[0]["password"] === $password)
            {
                if($user[0]["occupation"] === "student")
                {
                    header("Location: ../views/student.php");
                }
                else
                {
                    header("Location: ../views/teacher.php");
                }
            }
            else
            {
                $_SESSION["Err"] = "Account not found.";
                header("Location: ../views/login.php");
            }
        }
    }
    else
    {
        $_SESSION["Err"] = "Something went wrong";
        header("Location: ../views/login.php");
    }
}


?>