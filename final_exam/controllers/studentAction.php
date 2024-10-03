<?php
session_start();
require "../models/dbConnect.php";

if (!isset($_SESSION["id"])) {
    header("Location: ../views/login.php");
    exit();
}

$_SESSION["name"] = "";
$_SESSION["number"] = "";
$_SESSION["email"] = "";
$_SESSION["gender"] = "";

$_SESSION["nameErr"] = "";
$_SESSION["numberErr"] = "";
$_SESSION["emailErr"] = "";
$_SESSION["Err"] = "";
$isValid = true;

$id = $_SESSION["id"];
$db = new DbConnect();

$query = "SELECT * FROM account_info WHERE id = '$id'";

$user = $db->getData($query);
if (!$user) {
    $_SESSION["Err"] = "Something went wrong!";
    $isValid = false;
} else {
    $_SESSION["name"] = $user[0]["name"];
    $_SESSION["number"] = $user[0]["number"];
    $_SESSION["email"] = $user[0]["email"];
    $_SESSION["gender"] = $user[0]["gender"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_SESSION["email"])) {
            $_SESSION["emailErr"] = "Email cannot be empty";
            $isValid = false;
        } else {
            $email = $_SESSION["email"];
        }

        if (empty($_SESSION["name"])) {
            $_SESSION["nameErr"] = "Name cannot be empty";
            $isValid = false;
        } else {
            $name = $_SESSION["name"];
        }

        if (empty($_SESSION["number"])) {
            $_SESSION["numberErr"] = "number cannot be empty";
            $isValid = false;
        } else {
            $number = $_SESSION["number"];
        }
        $gender = $_SESSION["gender"];

        $query = "UPDATE account_info SET name = '$name', number = '$number', gender = '$gender', email = '$email' WHERE id = '$id'";

        $user = $db->executeData($query);

        if (!$user) {
            echo "Some Error occured";
        } else {
            header("Location: ../views/student.php");
        }
    }
}
