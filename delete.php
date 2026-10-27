<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "employee_db";

// Create database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Check whether employee ID is received
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // Delete employee
    $sql = "DELETE FROM employees WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        // Return to employee list
        header("Location: view.php");
        exit();

    } else {

        echo "Error deleting employee: " . $stmt->error;

    }

    $stmt->close();

} else {

    echo "Employee ID not found.";

}

$conn->close();

?>