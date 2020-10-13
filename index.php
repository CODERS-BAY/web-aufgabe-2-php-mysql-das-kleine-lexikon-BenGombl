<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <header>
        <nav>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {

            ?>
                <form action="auth/logout.php">
                    <button type="submit">Log Out</button>
                </form>
            <?php
            } else {
            ?>
                <form action="auth/login.php?login=1" method="POST">
                    <label for="username">Username:</label>
                    <input name="username" type="text">
                    <label for="password">Password:</label>
                    <input name="password" type="password">
                    <button type="submit">log in</button>
                </form>

                <form action="auth/register.php?register=1" method="post">
                    <label for="username">Username:</label>
                    <input type="text" name="username">
                    <label for="firstName">first Name:</label>
                    <input type="text" name="firstName">
                    <label for="lastName">last name:</label>
                    <input type="text" name="lastName">
                    <label for="email">email:</label>
                    <input type="email" name="email">
                    <label for="password">Password:</label>
                    <input type="password" name="password">
                    <label for="verify">verify Password</label>
                    <input type="password" name="verify">
                    <button type="submit">register</button>
                </form>
            <?php
            }
            ?>
            
        </nav>
        <h1>main Header</h1>
    </header>
    <main>

        <article class="flex">
            <?php
            include("inc/login.inc.php");
            $query = "Select id, title, teaser, imgPath from content";
            $result = $connection->query($query);


            while ($row = $result->fetch_assoc()) {
            ?>
                <section id="<?php echo ($row['id']) ?>" class="teaserCard">
                    <?php
                    if ($row["imgPath"]) {
                    ?>
                        <img src="<?php echo ("img/" . $row['imgPath']) ?>">
                    <?php
                    }

                    ?>
                    <p class="teaserText"><?php echo ($row['teaser']) ?></p>


                </section>
            <?php
            }
            if(isset($_SESSION['username'])){
                ?>
                <section id = "addEntryCard" class = "teaserCard">
                    <a href="auth/addEntry.php">(+)</a>
                </section>
                <?php
            }
            ?>




        </article>
        <article id="modal" class="modal">
            <section class="modalContent"></section>

            <button id="closeModal" type="button">close</button>
            <?php
            if (isset($_SESSION['username'])) {
            ?>

                <button class="editEntry">edit</button>
                <button id='discardChanges' type='button'>discard Changes</button>

            <?php
            }
            ?>







        </article>



    </main>
    <?php $connection->close(); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>