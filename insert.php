<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = "INSERT INTO events (event_name, event_date, location, description)
            VALUES ('$event_name', '$event_date', '$location', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Event Saved Successfully!</h2>";
        echo "<p><a href='index.php'>Go Back</a></p>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
