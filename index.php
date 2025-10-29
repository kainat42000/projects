<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Mehfil-e-Magic | Event Management System</title>
<h1 class="h1">Mehfil-e-Magic - Event Management System</h1>
</head>
<body>
    <header>
     
        <div class="user-info">
            <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>!
                <a href="logout.php" class="logout-btn">Logout</a>
            </p>
        </div>
    </header>

    <section class="form-section">
        <h2>Add New Event</h2>
        <form class="event-form" action="insert.php" method="POST">
            <label>Event Name:</label>
            <input type="text" name="event_name" required><br><br>

            <label>Event Date:</label>
            <input type="date" name="event_date" required><br><br>

            <label>Location:</label>
            <input type="text" name="location" required><br><br>

            <label>Description:</label>
            <input type="text" name="description"><br><br>

            <button type="submit">Save Event</button>
        </form>
    </section>

    <div class="view-events">
        <form action="list.php" method="GET">
            <button type="submit">View All Events</button>
        </form>
    </div>
    <footer>
    <p>© 2025 Mehfil-e-Magic | Developed by Kainat Khan</p>
</footer>

</body>
</html>
