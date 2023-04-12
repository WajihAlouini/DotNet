<!DOCTYPE html>
<html>
<head>
  <title>Reclamation Records</title>
  <style>
  body {
    font-family: Arial, sans-serif;
}

h1, h2 {
    text-align: center;
}

form {
    margin-bottom: 20px;
}

label {
    display: inline-block;
    width: 100px;
}

input[type="text"],
input[type="email"],
input[type="submit"] {
    display: block;
    margin-bottom: 10px;
    width: 100%;
}

table {
    border-collapse: collapse;
    margin: 0 auto;
}

table th,
table td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
}

table th {
    background-color: #eee;
}

table td:last-child {
    text-align: center;
}

table td a {
    color: #000;
    text-decoration: none;
}

table td a:hover {
    color: #f00;
}

  </style>
</head>
<body>
  <h1>Reclamation Records</h1>
  <table>
    <thead>
      <tr>
    <form action="send.php" method="post">
    <th><label for="idrec">idrec:</label></th>
    <th><input type="text" name="idrec" id="idrec" required></th>
        <th><label for="numrec">num de rclamation:</label></th>
        <th><input type="text" name="numrec" id="numrec" required></th>
        <th> <label for="titrerec">titre:</label><th>
        <th> <input type="text" name="titrerec" id="titrerec" required></th>
        <th><label for="description">description:</label></th>
        <th> <textarea name="description" rows="10" cols="30"></textarea></th>
        <th><label for="iduser">iduser:</label></th>
        <th> <input type="text" name="iduser" id="iduser" required></th>
        <input type="submit" value="send">
    </form>

    
    </table>
    
</body>
</html>