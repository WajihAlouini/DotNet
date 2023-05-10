<!doctype html>
<?php
    session_start(); 

    require 'connectionforum.php';
  

    try {
        $stmt = $pdo->query("SELECT * FROM forum");
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


    session_start(); 

    require 'connectionforum.php';

    try {
        $stmt = $pdo->query("SELECT * FROM forum");
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    ?>
    <head>
    <head>
<style>
body {
    background-color: #141414;
    font-family: Arial, sans-serif;
    color: #FFFFFF;
  }
  
  .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  
  h1 {
    font-size: 36px;
    font-weight: bold;
    margin-bottom: 20px;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  
  th, td {
    text-align: left;
    padding: 10px;
    border-bottom: 1px solid #FFFFFF;
  }
  
  th {
    background-color: #E50914;
  }
  
  tr:nth-child(even) {
    background-color: #222222;
  }
  
  tr:hover {
    background-color: #333333;
  }
  
  input[type="submit"] {
    background-color: #E50914;
    border: none;
    color: #FFFFFF;
    padding: 10px 20px;
    cursor: pointer;
  }
  
  input[type="submit"]:hover {
    background-color: #BF0812;
  }
  </style>
    <meta charset="utf-8">
    <title>Forum</title>
 
</head>
<body>
<form action="search_forum.php" method="GET">
  <input type="text" name="search" placeholder="Search Forum">
  <input type="submit" value="Search">
</form>

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
                <td><a href="post.php?title=<?php echo urlencode($row['title']); ?>"><?php echo htmlspecialchars($row['title']); ?></a>
</td>
                <td><?php echo htmlspecialchars($row['descrep']); ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td>
                    <form action="deleteforum.php" method="POST">
                        <input type="submit" value="Delete">
                        <input type="hidden" name="title" value="<?php echo $row['title']; ?>">
                        
                    </form>
                </td>
            </tr>
            
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
