<?php
$user = "root";
$password = "Pass@3346";
$database = "wpd";
$table = "et";

if (isset($_GET['City'])) {
    $qCity = $_GET['City'];
$sql = "SELECT * FROM et WHERE City='".$qCity."'";
} 
else {
    $qCity = "All";
$sql = "SELECT admin_name, City, Population FROM et  ";
}

try {

  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>$qadmin_name Data</h2><ol>"; 
echo "<table boarder =1><thead><tr><td>admin_name</td><td>City</td><td>population</td></tr></thead><tbody>";
  foreach($db->query($sql) as $row) {
echo "<tr><td>";
echo $row['admin_name'] ;
echo "</td><td>";
echo $row['City'] ;
echo "</td><td>";
echo $row['population'] ;
echo "</td></tr>";
  }
  echo "</tbody></table>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
