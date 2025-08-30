<!-- slum_review.php -->
<form action="slum_output.php" method="post">
  Name: <input type="text" name="name" value="<?php echo $_POST['name']; ?>"><br>
  Birthday: <input type="text" name="bday" value="<?php echo $_POST['bday']; ?>"><br>
  Favorite Color: <input type="text" name="color" value="<?php echo $_POST['color']; ?>"><br>
  <input type="submit" value="Finish">
</form>
