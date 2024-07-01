<?php
include('src/conn.php');
$id = $_GET['id'];
$data = $_GET['data'];
if ($data == 'doctor') {
  $res = mysqli_query($con, "DELETE FROM doctor WHERE id = '$id'");
} else if ($data == 'treatment') {
  $res = mysqli_query($con, "DELETE FROM treatment WHERE id = '$id'");
}
if ($res == 1) {
  echo '
    <script>
      alert("Deleted Sucessfully");
    </script>
    ';
  header("location:update.php");
} else {
  echo '
    <script>
      alert("Delete Unsucessful");
    </script>
    ';
  header("location:update.php");
}
