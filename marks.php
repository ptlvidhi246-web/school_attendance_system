<?php

include "db.php";

if (isset($_POST['add_marks'])) {

    $student_id = $_POST['student_id'];
    $subject = $_POST['subject'];
    $marks = $_POST['marks'];

    $sql = "INSERT INTO marks
            (student_id, subject, marks)
            VALUES
            ('$student_id', '$subject', '$marks')";

    $conn->query($sql);

    echo "<script>
            alert('Marks added successfully');
          </script>";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Academic Performance</title>

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

<h1>Academic Performance</h1>

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

<input type="text"
       name="subject"
       placeholder="Subject"
       required>

<input type="number"
       name="marks"
       placeholder="Marks"
       min="0"
       max="100"
       required>

<button type="submit"
        name="add_marks">

Add Marks

</button>

</form>

</div>

</body>
</html>