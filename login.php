<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Portal Homepage</title>
    </head>
    <body>
        <?php        
        session_start();
        $errors = array();

        if (isset($_POST['email']) && isset($_POST['password'])) {
            require_once 'database/dbconnection.php';
            
            $user = DB::run("SELECT * from users where email = ?", [$_POST['email']])->fetch(PDO::FETCH_ASSOC);
            
            if (!$user) {
                array_push($errors, "Username is incorrect");
            // uncomment the below once user creation uses password hashing
            // } else if (!password_verify('$_POST['password']', $user['password'])) {
            //     array_push($errors, "Password is incorrect");
            }
            if (count($errors) == 0) {
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $user['name'];
                header('location: courses/all_courses.php');
            } else {
                foreach ($errors as $error) {
                    echo '<p>' . $error . '</p>';
                }
                echo '<p><a href="login.php">Login failed, please try again</a></p>';
            }
        }
        ?>
    </body>
</html> 
