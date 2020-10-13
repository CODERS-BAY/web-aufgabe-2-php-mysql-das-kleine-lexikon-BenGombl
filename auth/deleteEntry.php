<?php

// $newTitle = $_POST['title'];
// $newTeaser = $_POST['teaser'];
// $newDescription = $_POST['description'];
$lexikonId = $_POST['lexikonId'];

// if($_FILES){
//     $file = $_FILES['upload']['name'];
    
// }
// else{
//     $file = null;
// }

// $target_dir = "../img/";
// $uploadOk= 1;
// $target_file = $target_dir.basename($_FILES["upload"]["name"]);
// $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// if(isset($_POST["submit"])){
//     $check = getimagesize($_FILES["upload"]["temp_name"]);
//     if($check !== false){
//         echo("File is image -").$check["mime"].".";
//         $uploadOk=1;
//     }
//     else{
//         echo("file is not image");
//         $uploadOk=0;
//         $file = null;
//     }
// }

// if($imageFileType!="jpg"&&$imageFileType!="jepg"&&$imageFileType!="png"&&$imageFileType!="gif"){
//     echo("only jpg, png, gif");
//     $uploadOk=0;
//     $file = null;
// }

// if($uploadOk == 0){
//     echo("nope");
//     $file = "";
// }
// else{
//     if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)){
//         echo("the File ".basename($_FILES["upload"]["name"])."has been uploaded.");
//     }
//     else{
//         echo("sry");
//     }
// }

include("../inc/login.inc.php");
$statement = $connection->prepare("DELETE FROM `content` WHERE `content`.`id` = $lexikonId");


$statement->execute();
$statement->close();
$connection->close();

if(isset($_SERVER["HTTP_REFERER"])){
    header("location: {$_SERVER['HTTP_REFERER']}");
}