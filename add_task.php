<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $startTime = $_POST["startTime"];

    $conn = new mysqli("localhost", "root", "", "todoDatabase");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tasks (description, start_time) VALUES ('$description', '$startTime')";
    if ($conn->query($sql) === true) {
        // Fetch the newly added task and return its HTML representation
        $newTaskResult = $conn->query("SELECT * FROM tasks WHERE id = LAST_INSERT_ID()");
        $newTask = $newTaskResult->fetch_assoc();
        echo "<p>" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp" .  $newTask["start_time"] . " - " . $newTask["description"] . "</p><br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
