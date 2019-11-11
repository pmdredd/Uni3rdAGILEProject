<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Submit Student Marks</title>
        </head>
    <body>
        <?php     
         session_start();
         $errors = array();

         if (isset($_POST['student_id']) && isset($_POST['course_id'])  && isset($_POST['marks'])) {
            require_once 'database/dbconnection.php';
            
            $query = "INSERT INTO courses (name) VALUES (?)";


            $sql = "INSERT INTO STUDENTABLE (RequestID,Subject, Info, 
                Email, OpenDate) VALUES ("
                    .$ID.",'" 
                .$_POST["StudentID"] . "', '" .
                $_POST["CourseID"] . "', '" .
                $_POST["Marks"]. "', "
                . "CURDATE()"
                .")"    ;
        
            $query_successful = mysqli_query($connection, $sql);        
            if ($query_successful) {
                echo '<p>Student Marks Sumbitted Sucessfully</p>';
                echo '<p>Details: ' . $ID . _POST["CourseID"] . $_SESSION["Marks"];
                echo '<p><a href="SystemHome.php">Home</a></p>';
            } else {
                echo '<p>Request failed!</p>';
                echo '<p>Please try again. <a href="SystemHome.php">Home</a></p>';
            }      
            mysqli_close($connection); 
    }
        ?>
    </body>
</html>