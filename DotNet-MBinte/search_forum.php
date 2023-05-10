<?php
require 'connectionforum.php';

// Retrieve the search keyword from the GET request
$search = $_GET['search'];

// Query the database to retrieve the forums that match the search keyword
$stmt = $pdo->prepare("SELECT * FROM forum WHERE title LIKE :search");
$stmt->execute(['search' => "%$search%"]);
$forums = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the search results
if (count($forums) > 0) {
  echo "<h2>Search Results:</h2>";
  foreach ($forums as $forum) {
    echo "<h3><a href='view_forum.php?title=" . $forum['title'] . "'>" . $forum['title'] . "</a></h3>";
    echo "<p>" . $forum['description'] . "</p>";
  }
} else {
  echo "<h2>No results found.</h2>";
}
?>
