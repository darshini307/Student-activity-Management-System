<?php

$conn = new mysqli('localhost', 'root', '', 'student_portal');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$regNumber = $_POST['age'];
$department = $_POST['Department'];
$academicYear = $_POST['academic-year'];
$section = $_POST['section'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$mobile = $_POST['mobile'];
$hostelDay = $_POST['hostel_day'];
$address = $_POST['Address'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 


$sql = "INSERT INTO students (name, reg_number, department, academic_year, section, dob, gender, mobile, hostel_day, address, email, password) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssssssss", $name, $regNumber, $department, $academicYear, $section, $dob, $gender, $mobile, $hostelDay, $address, $email, $password);

if ($stmt->execute()) {
    echo "Sign-up successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
