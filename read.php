<html>
<body>
<table>
<tr>
<th>User ID</th>
<th>Username</th>
<th>Password</th>

</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "forum");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM forum";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["title"] . "</td><td>" . $row["des"] . "</td><td>" . $row["name"] . "</td></tr>";
    }
} else {
    echo "No Results";
}
mysqli_close($conn);
?>
</table>
</body>
</html>
