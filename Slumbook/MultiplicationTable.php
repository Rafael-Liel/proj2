<form method="post">
  Enter rows: <input type="number" name="rows" value="3">
  Enter columns: <input type="number" name="cols" value="4">
  <input type="submit" name="gen" value="GENERATE">
</form>

<?php
if (isset($_POST['gen'])) {
  $r = $_POST['rows'];
  $c = $_POST['cols'];
  echo "<table border='1'>";
  for ($i = 1; $i <= $r; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $c; $j++) {
      echo "<td>" . ($i * $j) . "</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}
?>

<form method="post">
  Search: <input type="number" name="search">
  <input type="submit" name="find" value="SEARCH">
</form>

<?php
if (isset($_POST['find'])) {
  $r = $_POST['rows'];
  $c = $_POST['cols'];
  $s = $_POST['search'];
  echo "<table border='1'>";
  for ($i = 1; $i <= $r; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $c; $j++) {
      $val = $i * $j;
      if ($val == $s) {
        echo "<td style='background-color: yellow;'>$val</td>";
      } else {
        echo "<td>$val</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
}
?>
