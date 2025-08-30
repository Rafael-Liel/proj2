<form method="post">
  Enter amount: <input type="number" name="amount" value="3998">
  <input type="submit" name="ok" value="Generate">
</form>

<?php
if (isset($_POST['ok'])) {
  $amt = $_POST['amount'];

  $b1000 = intdiv($amt, 1000); $amt %= 1000;
  $b500 = intdiv($amt, 500); $amt %= 500;
  $b100 = intdiv($amt, 100); $amt %= 100;
  $b50 = intdiv($amt, 50); $amt %= 50;
  $b20 = intdiv($amt, 20); $amt %= 20;
  $c10 = intdiv($amt, 10); $amt %= 10;
  $c5 = intdiv($amt, 5); $amt %= 5;
  $c1 = $amt;

  echo "P1000 bills: <input readonly value='$b1000'><br>";
  echo "P500 bills: <input readonly value='$b500'><br>";
  echo "P100 bills: <input readonly value='$b100'><br>";
  echo "P50 bills: <input readonly value='$b50'><br>";
  echo "P20 bills: <input readonly value='$b20'><br>";
  echo "P10 coins: <input readonly value='$c10'><br>";
  echo "P5 coins: <input readonly value='$c5'><br>";
  echo "P1 coins: <input readonly value='$c1'><br>";
}
?>