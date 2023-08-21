<?php
$conn = new mysqli("localhost", "root", "", "todoDatabase");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tasks ORDER BY start_time ASC";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" .  $row["start_time"] . " - " . $row["description"] . "</p><br>";
    }
} else {
    echo "No tasks found.";
}

$conn->close();
?>
