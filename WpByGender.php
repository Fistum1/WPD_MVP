<?php
$user = "root";
$password = "Pass@3346";
$database = "wpd";
$table = "WPDG";

if (isset($_GET['COUNTRY'])) {
    $qCOUNTRY = $_GET['COUNTRY'];
$sql = "SELECT COUNTRY, CITY, SEX, POPULATION, YEAR FROM WPDG  WHERE COUNTRY='".$qCOUNTRY."'";
} 
else {
    $qCOUNTRY = "All";
$sql = "SELECT COUNTRY, CITY, SEX, POPULATION, YEAR FROM WPDG ";
}

try {

  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>$qCOUNTRY World Gender Data</h2><ol>"; 
echo "<table boarder =1><thead><tr><td>COUNTRY</td><td>CITY</td><td>SEX</td><td>POPULATION</td><td>YEAR</td></tr></thead><tbody>";
  foreach($db->query($sql) as $row) {
echo "<tr><td>";
echo $row['COUNTRY'] ;
echo "</td><td>";
echo $row['CITY'] ;
echo "</td><td>";
echo $row['SEX'] ;
echo "</td><td>";
echo $row['POPULATION'] ;
echo "</td><td>";
echo $row['YEAR'] ;
echo "</td></tr>";
  }
  echo "</tbody></table>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
