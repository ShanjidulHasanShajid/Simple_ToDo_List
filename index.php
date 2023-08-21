<!DOCTYPE html>
<html>

<head>
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=IBM+Plex+Mono&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="inpt">
        <h1>To-Do List</h1>
        <form id="todo-form">
            <label for="description">Task Description:</label>
            <br>
            <input type="text" id="description" required>
            <br>
            <label for="start-time">Start Time:</label>
            <br>
            <input type="datetime-local" id="start-time" required>
            <br>
            <br>
            <button type="submit">Add Task</button>
        </form>
    </div>
    <br>
    <br>
    <div id="task-list" class="task-list">
        <?php include "get_task.php"; ?>
    </div>
    <script>
        $(document).ready(function () {
            $("#todo-form").submit(function (event) {
                event.preventDefault();
                var description = $("#description").val();
                var startTime = $("#start-time").val();

                $.post("add_task.php", { description: description, startTime: startTime }, function (data) {
                    $("#task-list").append(data); // Add the new task to the list
                });

                $("#description").val("");
                $("#start-time").val("");
            });

            // Initial task list loading
            $.get("get_tasks.php", function (data) {
                $("#task-list").html(data);
            });
        });
    </script>

</body>

</html>