<!DOCTYPE HTML>
<html>
<head>
  <title>ЛБ1</title>
</head>
<?php
  include "connection.php";
  $teachers = $_GET['teacher'];
  $sqlSelect = $dbh->prepare("SELECT * FROM $db.teacher JOIN $db.lesson_teacher ON $db.teacher.ID_teacher = $db.lesson_teacher.FID_teacher JOIN $db.lesson ON $db.lesson_teacher.FID_Lesson1 = $db.lesson.ID_Lesson WHERE $db.teacher.name = :teachers");
  $sqlSelect->execute(array('teachers' => $teachers));
  echo "<table border ='1'>";
  echo "<tr><th>Teacher</th><th>Day</th><th>Number</th><th>Auditorium</th><th>Disciple</th><th>Type</th></tr>";
  while ($cell = $sqlSelect->fetch(PDO::FETCH_BOTH)) {
    echo "<tr><td>$cell[1]</td><td>$cell[5]</td><td>$cell[6]</td><td>$cell[7]</td><td>$cell[8]</td><td>$cell[9]</td></tr>";
  }
  echo "</table>";
?>