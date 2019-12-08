<?php
require_once 'coursework_functions.php';
require_once '../grades/grade_functions.php';
require_once '../header.html';

$courseworks = getAllCourseworks();
?>

<h1>Courseworks report</h1>
<hr>

<?php
foreach ($courseworks as $coursework) {
    echo "<h2>" . $coursework['name'] . "</h2>";
    $avg_mark = getCourseworkAverageMark($coursework['coursework_id']);
    echo "<p>Average mark: " . $avg_mark . "</p>";
    echo "<p>Average grade: " . calculateGradeFirstSubmission($avg_mark) . "</p>";
    echo "<p>Number of fails (grade below D3): " . getNumberOfFails($coursework['coursework_id']) . "</p>";
    echo "<p>Number of late submissions: " . getNumberOfLateSubmissions($coursework['coursework_id']) . "</p>";
    echo "<p>Number of second submissions: " . getNumberOfSecondSubmissions($coursework['coursework_id']) . "</p>";
    echo "<br>";
}
