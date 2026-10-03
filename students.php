<?php

include "db.php";

if (isset($_POST['add_student'])) {

    $roll = $_POST['roll_no'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students
            (roll_no, name, class, email)
            VALUES
            ('$roll', '$name', '$class', '$email')";

    $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Students</title>
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

<h1>Student Management</h1>

<form method="POST">

    <input type="text"
           name="roll_no"
           placeholder="Roll Number"
           required>

    <input type="text"
           name="name"
           placeholder="Student Name"
           required>

    <input type="text"
           name="class"
           placeholder="Class"
           required>

    <input type="email"
           name="email"
           placeholder="Email">

    <button type="submit"
            name="add_student">
        Add Student
    </button>

</form>

<br>

<table>

<tr>
    <th>ID</th>
    <th>Roll No</th>
    <th>Name</th>
    <th>Class</th>
    <th>Email</th>
</tr>

<?php

$result = $conn->query("SELECT * FROM students");

while ($row = $result->fetch_assoc()) {

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['roll_no']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['class']; ?></td>

<td><?php echo $row['email']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>