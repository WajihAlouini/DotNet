<!doctype html>
<?php
    session_start(); 

    require 'connectionforum.php';

    // Fetch records from the database
    try {
        $stmt = $pdo->query("SELECT * FROM forum");
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    try {
        $stmt = $pdo->query("SELECT DISTINCT title FROM forum");
        $titles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Handle form submission to update record
    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $new_descrep = $_POST['descrep'];
        $sql = "UPDATE forum SET descrep = :new_descrep WHERE title = :title";
        $stmt= $pdo->prepare($sql);
        $stmt->execute(['new_descrep' => $new_descrep, 'title' => $title]);
        header("Location: indexforum.php");
    }
?>
<head>
    <meta charset="utf-8">
    <title>Forum</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <h2>Modify Record</h2>
    <form method="POST" action="">
        <label for="title">Select a Title to Modify:</label>
        <select name="title" id="title">
            <?php foreach ($titles as $title) { ?>
                <option value="<?php echo $title['title']; ?>"><?php echo $title['title']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="descrep">New Description:</label>
        <input type="text" id="descrep" name="descrep" required>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    <br><br>
    <h2>Records</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Username</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $row) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo htmlspecialchars($row['descrep']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td>
                    <form action="deleteforum.php" method="POST">
                        <input type="submit" value="Delete">
                        <input type="hidden" name="id" value="<?php echo $row['title']; ?>">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
