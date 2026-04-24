<?php
require_once 'db.php';

$message = '';
$message_class = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $emp_name = trim($_POST['emp_name'] ?? '');
    $job_name = trim($_POST['job_name'] ?? '');
    $salary = trim($_POST['salary'] ?? '');
    $hire_date = trim($_POST['hire_date'] ?? '');
    $department_id = trim($_POST['department_id'] ?? '');
    $department_name = trim($_POST['department_name'] ?? '');

    if ($emp_name === '' || $job_name === '' || $salary === '' || $hire_date === '' || $department_id === '' || $department_name === '') {
        $message = 'Please fill out all fields.';
        $message_class = 'error';
    } else {
        $stmt = $conn->prepare(
            'INSERT INTO employees (emp_name, job_name, salary, hire_date, department_id, department_name)
             VALUES (?, ?, ?, ?, ?, ?)'
        );

        $stmt->bind_param('ssdsis', $emp_name, $job_name, $salary, $hire_date, $department_id, $department_name);

        if ($stmt->execute()) {
            $message = 'Employee record added successfully.';
            $message_class = 'success';
        } else {
            $message = 'Error adding employee: ' . $stmt->error;
            $message_class = 'error';
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Demo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="demo-page">
    <main class="demo-shell">
        <section class="demo-card">
            <h1 class="demo-title">Employee Demo Form</h1>
            <p class="demo-subtitle">This page uses PHP, MySQL, and a prepared statement to insert employee data.</p>

            <?php if ($message !== ''): ?>
                <div class="demo-msg <?php echo $message_class; ?>">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="employee_demo.php">
                <div class="demo-grid">
                    <div class="demo-field">
                        <label for="emp_name">Employee Name</label>
                        <input class="demo-input" type="text" name="emp_name" id="emp_name" required>
                    </div>

                    <div class="demo-field">
                        <label for="job_name">Job Name</label>
                        <input class="demo-input" type="text" name="job_name" id="job_name" required>
                    </div>

                    <div class="demo-field">
                        <label for="salary">Salary</label>
                        <input class="demo-input" type="number" step="0.01" name="salary" id="salary" required>
                    </div>

                    <div class="demo-field">
                        <label for="hire_date">Hire Date</label>
                        <input class="demo-input" type="date" name="hire_date" id="hire_date" required>
                    </div>

                    <div class="demo-field">
                        <label for="department_id">Department ID</label>
                        <input class="demo-input" type="number" name="department_id" id="department_id" required>
                    </div>

                    <div class="demo-field">
                        <label for="department_name">Department Name</label>
                        <input class="demo-input" type="text" name="department_name" id="department_name" required>
                    </div>
                </div>

                <div class="demo-actions">
                    <button class="demo-btn" type="submit">Add Employee</button>
                    <a class="demo-link" href="read_employees.php">View Records</a>
                </div>
            </form>
        </section>
    </main>
</body>
</html>