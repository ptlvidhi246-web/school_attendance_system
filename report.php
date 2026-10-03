<?php

include "db.php";

$students = $conn->query("SELECT * FROM students");

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Reports</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="navbar">

<h2>Smart School Portal</h2>

<div>

<a href="dashboard.php">Dashboard</a>
<a href="students.php">Students</a>
<a href="attendance.php">Attendance</a>
<a href="marks.php">Marks</a>
<a href="report.php">Reports</a>

</div>

</div>

<div class="container">

<h1>Student Performance Report</h1>

<table>

<tr>

<th>Roll No</th>
<th>Name</th>
<th>Attendance %</th>
<th>Academic %</th>
<th>Grade</th>

</tr>

<?php

while ($student = $students->fetch_assoc()) {

    $id = $student['id'];

    // Attendance

    $attendance = $conn->query(
        "SELECT
        SUM(status='Present') AS present,
        COUNT(*) AS total
        FROM attendance
        WHERE student_id=$id"
    )->fetch_assoc();

    if ($attendance['total'] > 0) {

        $attendance_percentage =
            ($attendance['present'] /
            $attendance['total']) * 100;

    } else {

        $attendance_percentage = 0;
    }

    // Marks

    $marks = $conn->query(
        "SELECT SUM(marks) AS obtained,
                SUM(total_marks) AS total
         FROM marks
         WHERE student_id=$id"
    )->fetch_assoc();

    if ($marks['total'] > 0) {

        $academic_percentage =
            ($marks['obtained'] /
            $marks['total']) * 100;

    } else {

        $academic_percentage = 0;
    }

    // Grade

    if ($academic_percentage >= 90) {

        $grade = "A+";

    } elseif ($academic_percentage >= 80) {

        $grade = "A";

    } elseif ($academic_percentage >= 70) {

        $grade = "B";

    } elseif ($academic_percentage >= 60) {

        $grade = "C";

    } elseif ($academic_percentage >= 50) {

        $grade = "D";

    } else {

        $grade = "F";
    }

?>

<tr>

<td>
<?php echo $student['roll_no']; ?>
</td>

<td>
<?php echo $student['name']; ?>
</td>

<td>
<?php echo round($attendance_percentage, 2); ?>%
</td>

<td>
<?php echo round($academic_percentage, 2); ?>%
</td>

<td>
<?php echo $grade; ?>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>

</html>