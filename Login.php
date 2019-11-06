<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Portal Homepage</title>
    </head>
    <body>
        <?php
        $adminacc = $_POST["username"];

        $sql = "SELECT Username FROM users WHERE Username = '"
                . strtolower(trim($_POST["username"])) . "' AND password = '"
                . sha1("LSaYEj4ffKrvnyZ7" . $_POST["password"])
                . "'";

        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) == 1) {

            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION["username"] = $row["Username"];
            }
            mysqli_free_result($result);

            echo '<h1>Welcome </h1>';
            $result = mysqli_query($connection, $sql);


            echo '
              INSERT HOMEPAGE CONTENT';
        } else {
            echo '<p>Login failed! Please try again!</p>';
            echo '<p><a href="index.php">Login</a></p>';
        }


        mysqli_close($connection);
        ?>
    </body>

</html> 


