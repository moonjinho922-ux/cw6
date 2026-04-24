<?php
require 'db.php';

$id = 5;

$stmt = $conn->prepare(
    'DELETE FROM employees
     WHERE emp_id = ?'
);

$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo 'Success! Deleted rows: ' . $stmt->affected_rows;
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?>