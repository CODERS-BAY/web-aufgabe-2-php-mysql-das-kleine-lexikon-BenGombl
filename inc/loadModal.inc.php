<?php
define("SECURE", true);
session_start();
include("login.inc.php");

$result = $connection->query("select title, description, teaser, imgPath from content where id =" . $_REQUEST["lexikonId"]);
$row = $result->fetch_assoc();
$response = "<div id = 'modalStuff'><h2>" . $row['title'] . "</h2>";
if ($row["imgPath"]) {
    $response .= "<img src = img/" . $row["imgPath"] . "></img>";
}
$response .= "<p>" . $row['description'] . "</p></div>";
if (isset($_SESSION["username"])) {
    $response .= "<form class = 'editEntryForm' action='auth/editEntry.php' method='post' enctype='multipart/form-data'>
    <label for='title'>Title:</label>
    <input type='text' name='title' value ='" . $row['title'] . "'>
    <label for='teaser'>Teaser:</label>
    <input type='text' name='teaser' value ='" . $row['teaser'] . "'>
    <label for='description'>Description</label>
    <textarea name='description'>" . $row['description'] . "</textarea>
    <label for='upload'>Upload File</label>
    <input type='file' name='upload'>
    <button type='submit'>confirm</button>
    <input type = 'hidden' name = 'lexikonId' value = '" . $_REQUEST['lexikonId'] . "'>
</form>
<form class = 'editEntryForm' action ='auth/deleteEntry.php' method = 'post'>
    <button type = 'submit'>delete Entry</button>
    <input type = 'hidden' name = 'lexikonId' value = '" . $_REQUEST['lexikonId'] . "'>
</form>
    ";
}
echo ($response);
