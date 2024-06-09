<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Lab_7"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select matric, name, and role from users table
$sql = "SELECT matric, name, role FROM users";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 50px auto;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Users List</h2>
    <table>
        <tr>
            <th>Matric</th>
            <th>Name</th>
            <th>Level</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["matric"]. "</td><td>" . $row["name"]. "</td><td>" . $row["role"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
 // In display.php, inside the while loop:
echo "<tr><td>" . $row["matric"]. "</td><td>" . $row["name"]. "</td><td>" . $row["accessLevel"]. "</td>";
echo "<td><a href='update.php?id=" . $row["id"] . "'>Update</a></td>";
echo "<td><a href='delete.php?id=" . $row["id"] . "'>Delete</a></td></tr>";

        $conn->close();
        ?>
    </table>
    

</body>
</html>
