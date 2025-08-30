<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slumbook</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f0f8ff;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            font-weight: bold;
        }
        textarea {
            width: 100%;
        }
    </style>
</head>
<body>

<h2>Slumbook Generator</h2>
<form action="slumbook_output.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>First Name:</label>
        <input type="text" name="firstname" required>
    </div>

    <div class="form-group">
        <label>Last Name:</label>
        <input type="text" name="lastname" required>
    </div>

    <div class="form-group">
        <label>Nickname:</label>
        <input type="text" name="nickname" required>
    </div>

    <div class="form-group">
        <label>Birthdate:</label>
        <select name="bmonth">
            <?php
                $months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                foreach ($months as $m) echo "<option>$m</option>";
            ?>
        </select>
        <select name="bday">
            <?php for ($i = 1; $i <= 31; $i++) echo "<option>$i</option>"; ?>
        </select>
        <select name="byear">
            <?php for ($i = 1980; $i <= 2025; $i++) echo "<option>$i</option>"; ?>
        </select>
    </div>

    <div class="form-group">
        <label>Secret Superhero Identity:</label>
        <input type="text" name="superhero">
    </div>

    <div class="form-group">
        <label>Favorite Sounds:</label><br>
        <input type="checkbox" name="sounds[]" value="Rain"> Rain
        <input type="checkbox" name="sounds[]" value="Birds"> Birds
        <input type="checkbox" name="sounds[]" value="Music"> Music
    </div>

    <div class="form-group">
        <label>Favorite Food:</label><br>
        <input type="checkbox" name="foods[]" value="Pizza"> Pizza
        <input type="checkbox" name="foods[]" value="Ice Cream"> Ice Cream
        <input type="checkbox" name="foods[]" value="Sinigang"> Sinigang
    </div>

    <div class="form-group">
        <label>How do you feel today?</label>
        <select name="feeling">
            <option>Happy</option>
            <option>Sad</option>
            <option>Excited</option>
            <option>Tired</option>
        </select>
    </div>

    <div class="form-group">
        <label>First Big Achievement:</label>
        <input type="text" name="first_achievement">
    </div>

    <div class="form-group">
        <label>Last Thing You Do Before Sleep:</label>
        <input type="text" name="last_thing">
    </div>

    <div class="form-group">
        <label>Dedication:</label><br>
        <textarea name="dedication" rows="4" placeholder="Write something nice..."></textarea>
    </div>

    <div class="form-group">
        <label>Upload Photo:</label>
        <input type="file" name="photo">
    </div>

    <button type="submit">GENERATE</button>
</form>

</body>
</html>