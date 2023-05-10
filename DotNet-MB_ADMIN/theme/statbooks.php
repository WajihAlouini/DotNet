
<?php
// Set database connection details
$host = 'localhost';
$dbname = 'topia';
$username = 'root';
$password = '';

// Connect to database using PDO
try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Define function to calculate rating mean
function calculateRatingMeane()
{
    global $db;

    try {
        // Select the distinct product IDs and names from the rate and produit tables
        $sql = "SELECT DISTINCT r.book_id, b.nomB
                FROM rates r 
                INNER JOIN books b ON r.book_id = b.id";
        $books = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        // Iterate through each product and calculate its average rating
        $averages = array();
        foreach ($books as $book) {
            $sql = "SELECT AVG(rating) AS average FROM rates WHERE book_id = :booksId";
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':booksId', $book['book_id'], PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $average = $result['average'];
            if ($average !== null) {
                $averages[] = array(
                    'book_id' => $book['book_id'],
                    'book_name' => $book['nomB'],
                    'rating_average' => $average
                );
            }
        }

        return $averages;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}


$averages = calculateRatingMeane();

$chart_data = '';
foreach ($averages as $average) {
    $chart_data .= "{ book_id:'".$average['book_id']."', book_name:'".$average['book_name']."', rating_average:".$average['rating_average']."}, ";
}
$chart_data = substr($chart_data, 0, -2);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/5.9.2/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js"></script>
</head>
<body>
<div class="container" style="width:260px;">
<h2 align="center">Books Rating</h2>
  
  <br /><br />
  <div id="charts"></div>


  <?php
$data = [];
foreach ($averages as $average) {
 $rating_average_formatted = number_format($average['rating_average'], 2);
 $data[] = [$average['book_name'] . ' (' . $rating_average_formatted . ')', $average['rating_average']];
}
?>

<script>
var chart = c3.generate({
 bindto: '#charts',
 data: {
   columns: <?php echo json_encode($data); ?>,
   type: 'donut'
 },
 donut: {
   title: "Books Rating",
   width: 50,
   class: 'donut-title'
 },
 tooltip: {
   format: {
     value: function(value, ratio, id, index) {
       return value.toFixed(2) + '%';
     }
   }
 },
 legend: {
   show: true,
   item: {
     style: {
       "fill": "#fff"
     }
   },
   style: {
     "color": "#fff"
   }
 },
 onrendered: function() {
   d3.selectAll('.c3-legend-item text')
     .style('fill', '#fff');
 }
});
d3.select('#charts .c3-chart-arcs-title')
  .style('fill', '#fff');


// Add CSS to the donut title element
var donutTitle = document.querySelector('.c3-chart-arcs-title');
donutTitle.style.fill = "#fff";
</script>

</div>
</body>
</html>