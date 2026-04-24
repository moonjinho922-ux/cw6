<?php
require 'db.php';

$id     = 1;
$name   = 'Ana Lopez';
$job    = 'Senior Developer';
$salary = 78000.00;
$hire   = '2025-09-15';
$deptId = 1;
$dept   = 'Engineering';

$stmt = $conn->prepare(
    'UPDATE employees
     SET emp_name = ?, job_name = ?, salary = ?, hire_date = ?, department_id = ?, department_name = ?
     WHERE emp_id = ?'
);

$stmt->bind_param('ssdsisi', $name, $job, $salary, $hire, $deptId, $dept, $id);

if ($stmt->execute()) {
    echo 'Success! Updated rows: ' . $stmt->affected_rows;
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>