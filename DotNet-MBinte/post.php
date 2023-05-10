<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Forum - Responsive HTML5 Template">
    <meta name="author" content="Forum">
    <link rel="shortcut icon" href="favicon/favicon.ico">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    
    <style> 
        body {
            background-color: black;
            color: white;
            font-family: sans-serif;
        }
        .post-wrapper {
            background-color: #222;
            color: white;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .post-title {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .post-desc {
            margin-bottom: 1rem;
        }
        .comment-form {
            width: 70%;
            margin-left: 2rem;
            margin-bottom: 2rem;
        }
        .comment-form label {
            display: block;
            margin-bottom: 0.5rem;
            color: white;
            font-weight: bold;
        }
        .comment-form input[type="text"], .comment-form textarea {
            width: 100%;
            padding: 0.5rem;
            border-radius: 0.25rem;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
        }
        .comment-form textarea {
            resize: none;
            height: 150px;
        }
        .comment-form button[type="submit"] {
            background-color: #e50914;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            border: none;
            cursor: pointer;
        }
        .comment-form button[type="submit"]:hover {
            background-color: #b2070a;
        }
    </style>
</head>
<body>

<?php
require 'connectionforum.php';
$title = $_GET['title'];

$stmt = $pdo->prepare("SELECT * FROM forum WHERE title = :title");
$stmt->execute(['title' => $title]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);
$query = "SELECT id FROM forum WHERE title = :title";
$stmt = $pdo->prepare($query);
$stmt->execute(['title' => $title]);
$row = $stmt->fetch();

if ($row) {
    // $row has data, so the query was successful
    $id_forum = $row['id'];
    echo "ID: " . $id_forum;
} else {
    // $row is null, so the query did not return any data
    echo "No data found.";
}

// Handle comment update
if (isset($_POST['update_comment'])) {
    $comment_id = $_POST['comment_id'];
    $new_comment = $_POST['new_comment'];
    
    $stmt = $pdo->prepare("UPDATE reponses SET rep = :new_comment WHERE id = :comment_id");
    $stmt->execute(['new_comment' => $new_comment, 'comment_id' => $comment_id]);
}

// Handle comment delete
if (isset($_POST['delete_comment'])) {
    $comment_id = $_POST['comment_id'];
    
    $stmt = $pdo->prepare("DELETE FROM reponses WHERE id = :comment_id");
    $stmt->execute(['comment_id' => $comment_id]);
}

// Retrieve the comments data from the database
$stmt = $pdo->prepare("SELECT * FROM reponses WHERE id_forum = :id_forum");
$stmt->execute(['id_forum' => $id_forum]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Display the comments using HTML
foreach ($comments as $comment) {
    echo "<div>";
    echo "<h4>" . $comment['username'] . "</h4>";
    echo "<p>" . $comment['rep'] . "</p>";
    
    // Add delete button
    echo "<form method='post'>";
    echo "<input type='hidden' name='comment_id' value='" . $comment['id'] . "'/>";
    echo "<input type='submit' name='delete_comment' value='Delete'/>";
    echo "</form>";
    
    // Add update form
    echo "<form method='post'>";
    echo "<input type='hidden' name='comment_id' value='" . $comment['id'] . "'/>";
    echo "<input type='text' name='new_comment' value='" . $comment['rep'] . "'/>";
    echo "<input type='submit' name='update_comment' value='Update'/>";
    echo "</form>";
    
    echo "</div>";
}
?>


<div class="container mx-auto">
    <div class="post-wrapper">
        <h1 class="post-title"><?php echo $post['title']; ?></h1>
        <p class="post-desc"><?php echo nl2br($post['descrep']); ?></p>
        <p>Posted by: <?php echo $post['username']; ?></p>
    </div>

    <div class="flex">
        <div class="w-3/4">
            <!-- Display the answers of the post here -->
        </div>
        <div class="w-1/4">
            <h1 class="text-xl font-bold mb-4">Submit a Comment</h1>
            <form class="comment-form" action="ajoutrep.php" method="post">
                <input type="hidden" name="post_id">
                <input type="hidden" name="forum_id" value="<?php echo $row['id']; ?>">
                <label for="comment">Comment:</label>
                <textarea id="comment" name="comment" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
    
</body
