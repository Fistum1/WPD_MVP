<?php
$user = "root";
$password = "Pass@3346";
$database = "wpd";
$table = "wpd_age";

if (isset($_GET['"CountryRegion"'])) {
    $qCountryRegion = $_GET['"CountryRegion"'];
$sql = "SELECT Variant, CountryRegion , Year, 0-14 , 15-29 , 30-44 , 45-59 , 60-74 , 75-89 , 90+ FROM wpd_age WHERE CountryRegion='".$qCountryRegion."'";
} 
else {
    $qCountryRegion = "All";
$sql = "SELECT Variant, CountryRegion , Year, 0-14 , 15-29 , 30-44 , 45-59 , 60-74 , 75-89 , 90+ FROM wpd_age ";
}

try {

  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>$qCountryRegion World Gender Data</h2><ol>"; 
echo "<table boarder =1><thead><tr><td>Variant</td><td> "CountryRegion"</td><td>Year</td><td>0-14</td><td>15-29</td><td>30-44</td><td>45-59</td><td>60-74</td><td>75-89</td><td>90+</td></tr></thead><tbody>";
  foreach($db->query($sql) as $row) {
echo "<tr><td>";
echo $row['Variant'] ;
echo "</td><td>";
echo $row['CountryRegion'] ;
echo "</td><td>";
echo $row['Year'] ;
echo "</td><td>";
echo $row['0-14'] ;
echo "</td><td>";
echo $row['15-29'] ;
echo "</td><td>";
echo $row['30-44'] ;
echo "</td><td>";
echo $row['45-59'] ;
echo "</td><td>";
echo $row['60-74'] ;
echo "</td><td>";
echo $row['75-89'] ;
echo "</td><td>";
echo $row['90+'] ;
echo "</td></tr>";
  }
  echo "</tbody></table>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
