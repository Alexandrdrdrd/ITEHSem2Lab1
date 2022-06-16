<!DOCTYPE HTML>
<html>
<head>
</head>
<?php
  include "connection.php";
  $auditorium = $_GET['auditorium'];
  $sqlSelect = $dbh->prepare("SELECT * FROM $db.lesson WHERE $db.lesson.auditorium = :auditorium");
  $sqlSelect->execute(array('auditorium' => $auditorium));
  echo "<table border ='1'>";
  echo "<tr><th>Auditorium</th><th>Day</th><th>Number</th><th>Disciple</th><th>Type</th></tr>";
  while($cell=$sqlSelect->fetch(PDO::FETCH_BOTH)){
      echo "<tr><td>$cell[3]</td><td>$cell[1]</td><td>$cell[2]</td><td>$cell[4]</td><td>$cell[5]</td></tr>";
  }
  echo "</table>";
?>