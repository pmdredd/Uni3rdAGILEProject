<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Submit Student Marks</title>
        </head>
    <body>
        <?php     
        session_start();
        require_once 'database/dbconnection.php'; // $connection
        
        $Mark =  $_POST["Marks"];
        $Attemp2 = $_POST["AttemptSecond"]
        
        
    function get_alphanumeric_grade ($Mark,$Attemp2) {
        
        If ($Attemp2 >= 40) {
        return "D3"; }
        elseif if($_POST["Marks"] >= 35) {
        return "MF"; }
        elseif if($_POST["Marks"] >= 20) {
            return "CF"; }
        elseif if($_POST["Marks"] >= 1) {
            return "BF";
        elseif if($_POST["Marks"] >= 0) {
            return "0"; }
            
        $Grade= if($_POST["Marks"] >= 90)  {
            return "A1"; }
        elseif if($_POST["Marks"] >= 80) {
            return "A2"; }
        elseif if($_POST["Marks"] >= 70) {
            return "A3"; }
        elseif if($_POST["Marks"] >= 66) {
            return "B1"; }
        elseif if($_POST["Marks"] >= 63) {
            return "B2"; }
        elseif if($_POST["Marks"] >= 60) {
            return "B3"; }
        elseif if($_POST["Marks"] >= 56) {
            return "C1"; }
        elseif if($_POST["Marks"] >= 53) {
            return "C2"; }
        elseif if($_POST["Marks"] >= 50) {
            return "C3"; }
        elseif if($_POST["Marks"] >= 46) {
            return "D1"; }
        elseif if($_POST["Marks"] >= 43) {
            return "D2"; }
        elseif if($_POST["Marks"] >= 40) {
            return "D3"; }
        elseif if($_POST["Marks"] >= 35) {
            return "MF"; }
        elseif if($_POST["Marks"] >= 20) {
            return "CF"; }
        elseif if($_POST["Marks"] >= 1) {
            return "BF"; }
        elseif if($_POST["Marks"] >= 0) {
            return "0"; }
    }    
        $sql = "INSERT INTO MARKS (StudentID,CourseID, Marks, 
            Grade, Attempt, SubmissionDate) VALUES ("
               $_POST["StudentID"] . "', '" .
               $_POST["CourseID"] . "', '" .
               $_POST["Marks"]. "', " .
               $Grade . "', " 
              . "CURDATE()"
               .")"    ;
    
           $query_successful = mysqli_query($connection, $sql);        
        if ($query_successful) {
            echo '<p>Student Marks Sumbitted Sucessfully</p>';
            echo '<p><a href="SystemHome.php">Home</a></p>';
        } else {
            echo '<p>Request failed!</p>';
            echo '<p>Please try again. <a href="SystemHome.php">Home</a></p>';
        }      
        mysqli_close($connection); 
        ?>
    </body>
</html>