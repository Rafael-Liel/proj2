<?php
session_start();

if (!isset($_SESSION['form_data'])) {
    echo "No data found. Please fill up the slambook first.";
    exit;
}

$data = $_SESSION['form_data'];
$photo = isset($_SESSION['photo_path']) ? $_SESSION['photo_path'] : null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Slambook Page</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom, #e1f5fe, #b3e5fc);
            padding: 40px;
        }
        .slambook {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0288d1;
            text-align: center;
        }
        .photo {
            text-align: center;
            margin-bottom: 20px;
        }
        .photo img {
            width: 150px;
            border-radius: 50%;
            border: 3px solid #4fc3f7;
        }
        .field {
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            color: #0277bd;
        }
    </style>
</head>
<body>

<div class="slambook">
    <h1>My SlamBook</h1>

    <?php if ($photo): ?>
    <div class="photo">
        <img src="<?= $photo ?>" alt="My Photo">
    </div>
    <?php endif; ?>

    <div class="field"><span class="label">Full Name:</span> <?= $data['firstname'] . " " . $data['lastname'] ?></div>
    <div class="field"><span class="label">Nickname:</span> <?= $data['nickname'] ?></div>
    <div class="field"><span class="label">Secret Identity:</span> <?= $data['secret_idenitity'] ?></div>
    <div class="field"><span class="label">Birthdate:</span> <?= $data['b_month'] . " " . $data['b_day'] . ", " . $data['b_year'] ?></div>
    <div class="field"><span class="label">Favorite Sounds:</span> <?= isset($data['fav_sound']) ? implode(", ", $data['fav_sound']) : "None" ?></div>
    <div class="field"><span class="label">Favorite Foods:</span> <?= isset($data['fav_food']) ? implode(", ", $data['fav_food']) : "None" ?></div>

    <hr>

    <div class="field"><span class="label">First Achievement:</span> <?= $data['first_achievement'] ?></div>
    <div class="field"><span class="label">First Risk:</span> <?= $data['first_risk'] ?></div>
    <div class="field"><span class="label">First Grown-up Thing:</span> <?= $data['first_grownup'] ?></div>
    <div class="field"><span class="label">First Time Happy:</span> <?= $data['first_Happy'] ?></div>
    <div class="field"><span class="label">First Friend:</span> <?= $data['first_friend'] ?></div>

    <hr>

    <div class="field"><span class="label">Last Cry:</span> <?= $data['last_cry'] ?></div>
    <div class="field"><span class="label">Last Trip:</span> <?= $data['last_trip'] ?></div>
    <div class="field"><span class="label">Last Song:</span> <?= $data['last_song'] ?></div>
    <div class="field"><span class="label">Before Sleep:</span> <?= $data['last_sleep'] ?></div>

    <hr>

    <div class="field"><span class="label">Feeling Today:</span> <?= $data['feeling'] ?></div>
    <div class="field"><span class="label">Dedication:</span> <?= nl2br($data['dedication']) ?></div>
</div>

</body>
</html>