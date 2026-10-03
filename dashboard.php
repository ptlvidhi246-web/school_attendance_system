<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

include "db.php";

$students = $conn->query("SELECT COUNT(*) AS total FROM students")
                ->fetch_assoc()['total'];

$present = $conn->query(
    "SELECT COUNT(*) AS total
     FROM attendance
     WHERE status='Present'"
)->fetch_assoc()['total'];

$absent = $conn->query(
    "SELECT COUNT(*) AS total
     FROM attendance
     WHERE status='Absent'"
)->fetch_assoc()['total'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
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
        <a href="logout.php">Logout</a>
    </div>

</div>

<div class="container">

    <h1>Dashboard</h1>

    <div class="cards">

        <div class="card">
            <h3>Total Students</h3>
            <h1><?php echo $students; ?></h1>
        </div>

        <div class="card">
            <h3>Present</h3>
            <h1><?php echo $present; ?></h1>
        </div>

        <div class="card">
            <h3>Absent</h3>
            <h1><?php echo $absent; ?></h1>
        </div>

    </div>

</div>

</body>
</html>