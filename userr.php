
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bla bla</title>
</head>
<body>
    
</body>



<div class="iq-card-body">
<div class="table-view">
   <table class="data-tables table movie_table" style="width:100%">
      <thead>
         <tr>
            
            <th style="width: 10%;">Name</th>
            <th style="width: 20%;">Contact</th>
            <th style="width: 20%;">Email</th>
            <th style="width: 10%;">Country</th>
            <th style="width: 10%;">Status</th>
            <th style="width: 10%;">Join Date</th>
            <th style="width: 10%;">Action</th>
         </tr>
      </thead>



           <?php
$conn = mysqli_connect("localhost", "root", "", "streamtopia");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM accounts JOIN abonnement ON accounts.User_id = abonnement.User_id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody>

      
        <tr>
          
        <td>". $row["Name"] ."</td>
        <td>". $row["User_id"] . "</td>
           <td>". $row["Email"] ."</td>
           <td>". $row["id_abon"] . "</td>";
    }
} else {
    echo "No Results";
}
mysqli_close($conn);
?>
     

</html>
