<!DOCTYPE html>
<html lang="en">
<?php
include("auth.php");
define('SECURE', true);
?>

<head>

    <link rel="stylesheet" href="../css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add Entry</title>
</head>

<body>
    <?php
    include("../inc/login.inc.php");
    ?>
    <form action="../inc/saveEntry.inc.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name = "title">
        <label for="teaser">Teaser:</label>
        <input type="text" name = teaser>
        <label for="description">Description</label>
        <textarea type= "text" name="description"></textarea>
        <label for="upload">Upload File</label>
        <input type="file" name = "upload">
        <button type = "submit">add Entry</button>
    </form>






    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>

</html>