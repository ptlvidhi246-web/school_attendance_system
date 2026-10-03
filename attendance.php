<?php

include "db.php";

if (isset($_POST['submit_attendance'])) {

    $student_id = $_POST['student_id'];
    $date = $_POST['attendance_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO attendance
            (student_id, attendance_date, status)
            VALUES
            ('$student_id', '$date', '$status')";

    $conn->query($sql);

    echo "<script>
            alert('Attendance saved successfully');
          </script>";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance</title>

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

<h1>Mark Attendance</h1>

<form method="POST">

<select name="student_id" required>

<option value="">Select Student</option>

<?php

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_assoc()) {

?>

<option value="<?php echo $row['id']; ?>">

<?php
echo $row['roll_no'] . " - " . $row['name'];
?>

</option>

<?php } ?>

</select>

<input type="date"
       name="attendance_date"
       required>

<select name="status">

<option value="Present">Present</option>

<option value="Absent">Absent</option>

</select>

<button type="submit"
        name="submit_attendance">

Save Attendance

</button>

</form>

</div>

</body>
</html>