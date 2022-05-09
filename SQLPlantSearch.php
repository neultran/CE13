<?php

require_once 'DataBaseConnection.php';

// function to print distance
function PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2) {
    $dist = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2) + pow($z2 - $z1, 2) * 1.0);
    return $dist;
}
//use Get to get variables
$shipspeed = $_GET['speed'];
$planetID1 = $_GET['ID1'];
$planetID2 = $_GET['ID2'];

//Query first planet
$sql1 = "SELECT * FROM CSIS2440.Planets where idPlanets = ".$planetID1;
$return = $con->query($sql1);

if(!$return){
  $message = "Whole Query " .$sql1;
  echo $message;
  die("invalid query: ". mysqli_error($con));

}


while ($row = $return->fetch_assoc()){
  $pname1 = $row['PlanetName'];
  $x1 = $row['PosX'];
  $y1 = $row['PosY'];
  $z1 = $row['PosZ'];
  $desc1 = $row['Desc'];
  $faction1 = $row['faction'];
  $active1 = $row['Active'];
}
//query second planet
$sql2 = "SELECT * FROM CSIS2440.Planets where idPlanets = ".$planetID2;

if(!$return){
  $message = "Whole Query " .$sql2;
  echo $message;
  die("invalid query: ". mysqli_error($con));
}

while ($row = $return->fetch_assoc()){
  $pname2 = $row['PlanetName'];
  $x2 = $row['PosX'];
  $y2 = $row['PosY'];
  $z2 = $row['PosZ'];
  $desc2 = $row['Desc'];
  $faction2 = $row['faction'];
  $active2 = $row['Active'];
}
//que
//lets print everything out
echo "<div class=\"row\"><div class=\"col-md-5\"><table><th>Name</th>"
    "<th width="10%">X,Y,Z</th><th>Description</th><th>Station</th>\n";

echo "<tr><td>".pname1
    . "\n</td><td>".$x1." ,".$y1." ,".$z1
    . "\n</td><td>".$desc1
    . "\n</td><td>".$active1."</td></tr>";
echo "\n</table></div>";


echo "\n<div class=\"col-md-5\"><table><th>Name</th>"
    "<th width="10%">X,Y,Z</th><th>Description</th><th>Station</th>\n";

echo "<tr><td>".pname2
    . "\n</td><td>".$x2." ,".$y2." ,".$z2
    . "\n</td><td>".$desc2
    . "\n</td><td>".$active2."</td></tr>";
echo "\n</table></div></div>";


//if there is no space station you cannot visit
if ($active1 != "N" && $active2 != "N") {
  print("\n<div class=\"row\"><div class=\"col-xs-12\">Going from $pname1 to $pname2 will be a long trip.");
  $dist = PlanetDistance($x1, $y1, $z1, $x2, $y2, $z2);
  printf("\n<p>The distance is: %.2f</p>", $dist);
  printf("\n<p>The time it should take is: %.2f cycles</p></div></div>", ($dist / $shipspeed));
} else{
  print("\n<div class=\"row\"><div class=\"col-xs-12\"></p>"
  . "One of the planets is not active, you cannot travel there.</p></div></div>");
}
