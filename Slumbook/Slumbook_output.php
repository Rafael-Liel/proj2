<!DOCTYPE html>
<html>
<head>
    <title>Slumbook Output</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: ##e3f2fd;
            color: #0d47a1;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #1565c0;
        }
        .output-box {
            max-width: 700px;
            margin: auto;
            background: #e3f2fd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10pxrgb(59, 145, 206);
        }
        img {
            max-width: 200px;
            border-radius: 10px;
            display: block;
            margin: 10px auto;
        }
        .section {
            margin-top: 30px;
        }
        .section h3 {
            color: #0d47a1;
        }
        ul {
            list-style: none;
            padding-left: 0;
        }
        li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h1>Your Digital Slumbook</h1>
    <div class="output-box">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
                $uploadDir = "uploads/";
                if (!is_dir($uploadDir)) mkdir($uploadDir);
                $fileName = basename($_FILES["photo"]["name"]);
                $targetPath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetPath)) {
                    echo "<img src='$targetPath' alt='Uploaded Photo'>";
                } else {
                    echo "<p>Failed to upload image.</p>";
                }
            }

            echo "<div class='section'><h3>Basic Info</h3><ul>";
            echo "<li><strong>First Name:</strong> " . htmlspecialchars($_POST["firstname"]) . "</li>";
            echo "<li><strong>Last Name:</strong> " . htmlspecialchars($_POST["lastname"]) . "</li>";
            echo "<li><strong>Nickname:</strong> " . htmlspecialchars($_POST["nickname"]) . "</li>";
            echo "<li><strong>Secret Identity:</strong> " . htmlspecialchars($_POST["secret_idenitity"]) . "</li>";
            echo "<li><strong>Birthdate:</strong> " . htmlspecialchars($_POST["b_month"]) . " " . htmlspecialchars($_POST["b_day"]) . ", " . htmlspecialchars($_POST["b_year"]) . "</li>";
            echo "</ul></div>";

            echo "<div class='section'><h3>Favorites</h3><ul>";
            if (!empty($_POST["fav_color"])) {
                echo "<li><strong>Sounds:</strong> " . implode(", ", $_POST["fav_color"]) . "</li>";
            }
            if (!empty($_POST["fav_food"])) {
                echo "<li><strong>Foods:</strong> " . implode(", ", $_POST["fav_food"]) . "</li>";
            }
            echo "</ul></div>";

            echo "<div class='section'><h3>My Firsts</h3><ul>";
            echo "<li><strong>Big Achievement:</strong> " . htmlspecialchars($_POST["first_achievement"]) . "</li>";
            echo "<li><strong>Risk:</strong> " . htmlspecialchars($_POST["first_risk"]) . "</li>";
            echo "<li><strong>Grown-up Thing:</strong> " . htmlspecialchars($_POST["first_grownup"]) . "</li>";
            echo "<li><strong>First Happiness:</strong> " . htmlspecialchars($_POST["first_Happy"]) . "</li>";
            echo "<li><strong>First Friend:</strong> " . htmlspecialchars($_POST["first_friend"]) . "</li>";
            echo "</ul></div>";

            echo "<div class='section'><h3>My Lasts</h3><ul>";
            echo "<li><strong>Last Cry:</strong> " . htmlspecialchars($_POST["last_cry"]) . "</li>";
            echo "<li><strong>Last Trip:</strong> " . htmlspecialchars($_POST["last_trip"]) . "</li>";
            echo "<li><strong>Last Song:</strong> " . htmlspecialchars($_POST["last_song"]) . "</li>";
            echo "<li><strong>Before Sleep:</strong> " . htmlspecialchars($_POST["last_sleep"]) . "</li>";
            echo "</ul></div>";

            echo "<div class='section'><h3>Today's Vibe</h3>";
            echo "<p><strong>Feeling Today:</strong> " . htmlspecialchars($_POST["feeling"]) . "</p></div>";


            echo "<div class='section'><h3>Dedication</h3>";
            echo "<p>" . nl2br(htmlspecialchars($_POST["dedication"])) . "</p></div>";
        } else {
            echo "<p>No data received.</p>";
        }
        ?>
    </div>
</body>
</html>
