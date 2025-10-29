<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];

    $sql = "UPDATE events 
            SET event_name='$event_name', event_date='$event_date', location='$location', description='$description'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Event Updated Successfully! <a href='list.php'>Back to List</a>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>
