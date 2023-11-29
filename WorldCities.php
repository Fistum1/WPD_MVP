<?php
$user = "root";
$password = "Pass@3346";
$database = "wpd";
$table = "worldcities";

if (isset($_GET['CITY'])) {
    $qCITY = $_GET['CITY'];
$sql = "SELECT * FROM worldcities WHERE CITY='".$qCITY."'";
} else {
    $qiso = "All";
$sql = "SELECT COUNTRY, ISO3, CITY, POPULATION FROM worldcities ";
}

try {

  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>$qState Data</h2><ol>"; 
echo "<table boarder =1><thead><tr><td>COUNTRY</td><td>ISO3</td><td>CITY</td><td>Population</td></tr></thead><tbody>";
  foreach($db->query($sql) as $row) {
echo "<tr><td>";
echo $row['COUNTRY'] ;
echo "</td><td>";
echo $row['ISO3'] ;
echo "</td><td>";
echo $row['CITY'] ;
echo "</td><td>";
echo $row['POPULATION'];
echo "</td></tr>";
  }
  echo "</tbody></table>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
