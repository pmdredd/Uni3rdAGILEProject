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
        $Attemp2 = $_POST["AttemptSecond"];
        $Student_ID = $_POST["StudentID"];
        $Course_ID = $_POST["CourseID"];
        
    function get_alphanumeric_grade ($Mark,$Attemp2) {
        
        If ($Attemp2 >= 40) {
            return "D3"; }
        elseif if($_POST["Marks"] >= 37) {
            return "MF1"; }
        elseif if($_POST["Marks"] >= 34) {
            return "MF2"; }
        elseif if($_POST["Marks"] >= 30) {
            return "MF3";
        elseif if($_POST["Marks"] >= 20) {
            return "CF"; }
         elseif if($_POST["Marks"] >= 0) {
            return "BF"; }
           
        $Grade= if($_POST["Marks"] >= 95)  {
            return "A1"; }
        elseif if($_POST["Marks"] >= 89) {
            return "A2"; }
        elseif if($_POST["Marks"] >= 83) {
            return "A3"; }
        elseif if($_POST["Marks"] >= 76) {
            return "A4"; }
        elseif if($_POST["Marks"] >= 70) {
            return "A5"; }
        elseif if($_POST["Marks"] >= 67) {
            return "B1"; }
        elseif if($_POST["Marks"] >= 64) {
            return "B2"; }
        elseif if($_POST["Marks"] >= 60) {
            return "B3"; }
        elseif if($_POST["Marks"] >= 57) {
            return "C1"; }
        elseif if($_POST["Marks"] >= 54) {
            return "C2"; }
        elseif if($_POST["Marks"] >= 50) {
            return "C3"; }
        elseif if($_POST["Marks"] >= 47) {
            return "D1"; }
        elseif if($_POST["Marks"] >= 44) {
            return "D2"; }
        elseif if($_POST["Marks"] >= 40) {
            return "D3"; }
        elseif if($_POST["Marks"] >= 37) {
            return "MF1"; }
        elseif if($_POST["Marks"] >= 34) {
            return "MF2"; }
        elseif if($_POST["Marks"] >= 30) {
            return "MF3";
        elseif if($_POST["Marks"] >= 20) {
            return "CF"; }
         elseif if($_POST["Marks"] >= 0) {
            return "BF"; }
    }
            
    function submit_Submission($Student_ID, $Course_ID, $Mark, $Grade){
    /*    $sql = "INSERT INTO TABLENAME (StudentID,CourseID, Marks, 
            Grade, Attempt, SubmissionDate) VALUES ("
               $_POST["StudentID"] . "', '" .
               $_POST["CourseID"] . "', '" .
               $_POST["Marks"]. "', " .
               $Grade . "', " 
              . "CURDATE()"
               .")"    ;
     */   
     
        $submission = DB::run("INSERT INTO TABLENAME (StudentID,CourseID, Marks, 
            Grade, Attempt, SubmissionDate) VALUES (?,?,?,?,?, CURDATE()", [$Student_ID], [$Course_ID], [$Mark], [$Grade], [$Attemp2])->fetch();
        return $submission;
    }
            
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
