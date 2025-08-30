<form method="post">
  Enter rows: <input type="number" name="rows" value="3">
  Enter columns: <input type="number" name="cols" value="4">
  <input type="submit" name="gen" value="GENERATE">
</form>

<?php
$rows = isset($_POST['rows']) ? (int)$_POST['rows'] : 3;
$cols = isset($_POST['cols']) ? (int)$_POST['cols'] : 4;
$table = [];

if (isset($_POST['gen']) || isset($_POST['find'])) {
  echo "<table border='1'>";
  for ($i = 1; $i <= $rows; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= $cols; $j++) {
      $val = $i * $j;
      $table[$i][$j] = $val;


      if (isset($_POST['find']) && $_POST['search'] == $val) {
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

<form method="post">
  <input type="hidden" name="rows" value="<?php echo $rows; ?>">
  <input type="hidden" name="cols" value="<?php echo $cols; ?>">

  Search: <input type="number" name="search">
  <input type="submit" name="find" value="SEARCH">
</form>

