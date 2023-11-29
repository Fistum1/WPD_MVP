<?php
$user = "root";
$password = "Pass@3346";
$database = "wpd";
$table = "us_states101";

if (isset($_GET['City'])) {
    $qCity = $_GET['City'];
$sql = "SELECT * FROM us_states101 WHERE City='".$qCity."'";
} elseif (isset($_GET['State'])) {
    $qState = $_GET['State'];
$sql = "SELECT State, City, Population FROM us_states101 where State='".$qState."'";
} else {
    $qState = "All";
$sql = "SELECT State, City, Population FROM us_states101 ";
}

try {

  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>$qState Data</h2><ol>"; 
echo "<table boarder =1><thead><tr><td>State Name</td><td>City</td><td>Population</td></tr></thead><tbody>";
  foreach($db->query($sql) as $row) {
echo "<tr><td>";
echo $row['State'] ;
echo "</td><td>";
echo $row['City'] ;
echo "</td><td>";
echo $row['Population'];
echo "</td></tr>";
  }
  echo "</tbody></table>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
