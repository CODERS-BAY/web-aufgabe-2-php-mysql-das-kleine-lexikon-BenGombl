<?php
session_start();

require_once('../inc/login.inc.php');

if(isset($_GET['register'])){
    $error = false;
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $verify = htmlspecialchars($_POST['verify']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $username = htmlspecialchars($_POST['username']);

    

    if($password != $verify){
        echo("verify Password!");
        $error= true;
    }
    if(strlen($password) == 0){
        echo("enter password!");
        $error = true;
    }

    if(!$error){
        $statement = $connection->prepare("SELECT * FROM user WHERE email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result();
        if($result->num_rows > 0){
            echo("this email is already registered!");
            $error = true;
        }
    }
    if(!$error){
        $statement = $connection->prepare("INSERT INTO user (username, email, password, firstName, lastName) VALUES (?, ?, ?, ?, ?)");
        $statement->bind_param("sssss", $username, $email, $hash, $firstName, $lastName);

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $statement->execute();
        $statement->close();
        $connection->close();
        $_SESSION['username'] = $username;
        header("location: ../index.php");
    }
}