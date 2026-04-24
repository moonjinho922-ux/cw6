<?php
require_once 'db.php';

$result = $conn->query('SELECT emp_id, emp_name, job_name, salary, hire_date, department_id, department_name FROM employees ORDER BY emp_id DESC');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="demo-page">
    <main class="demo-shell">
        <section class="demo-card">
            <h1 class="demo-title">Employee Records</h1>
            <p class="demo-subtitle">This page reads employee data from the MySQL database.</p>

            <div class="demo-actions">
                <a class="demo-link" href="employee_demo.php">Back to Form</a>
            </div>

            <div class="table-wrap">
                <table class="demo-table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Job</th>
                        <th>Salary</th>
                        <th>Hire Date</th>
                        <th>Dept ID</th>
                        <th>Department</th>
                    </tr>

                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['emp_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['emp_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['job_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['salary']); ?></td>
                            <td><?php echo htmlspecialchars($row['hire_date']); ?></td>
                            <td><?php echo htmlspecialchars($row['department_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['department_name']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>
        </section>
    </main>
</body>
</html>