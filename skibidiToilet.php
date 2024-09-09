<?php
$servername = "localhost";
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "dictionary_db";

// Create connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection works
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST["word"];

    // Prepare the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT explanation FROM dictionary WHERE word = ?");
    $stmt->bind_param("s", $word);

    // Execute the statement
    $stmt->execute();
    $stmt->bind_result($explanation);

    if ($stmt->fetch()) {
        // Redirect back to the form with the explanation
        header("Location: index.html?explanation=" . urlencode($explanation));
    } else {
        // If no explanation was found, display an error
        header("Location: index.html?error=" . urlencode("No explanation found for: " . $word));
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
