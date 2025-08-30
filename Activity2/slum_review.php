<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['form_data'] = $_POST;
    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $uploadDir = 'uploads/';
        
        $safeFileName = uniqid() . '_' . basename($photo['name']);
        $uploadPath = $uploadDir . $safeFileName;
    

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
    
        if (move_uploaded_file($photo['tmp_name'], $uploadPath)) {
            $_SESSION['photo_path'] = $uploadPath;
        } else {
            $_SESSION['photo_path'] = null;
        }
    } else {
        $_SESSION['photo_path'] = null;
    }
}

function sanitize($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$data = $_SESSION['form_data'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review Your Slumbook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            max-width: 700px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #1565c0;
        }
        .btn-group {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
        .btn-group button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-weight: bold;
            border-radius: 5px;
        }
        .confirm {
            background-color: #4caf50;
            color: white;
        }
        .edit {
            background-color: #f44336;
            color: white;
        }
        img.preview {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Review Your Info</h2>
        <p><strong>First Name:</strong> <?= sanitize($data['firstname']) ?></p>
        <p><strong>Last Name:</strong> <?= sanitize($data['lastname']) ?></p>
        <p><strong>Nickname:</strong> <?= sanitize($data['nickname']) ?></p>
        <p><strong>Secret Identity:</strong> <?= sanitize($data['secret_identity']) ?></p>
        <p><strong>Birthdate:</strong> <?= sanitize($data['b_month']) . ' ' . sanitize($data['b_day']) . ', ' . sanitize($data['b_year']) ?></p>

        <p><strong>Favorite Sounds:</strong> <?= isset($data['fav_sound']) ? implode(", ", array_map('sanitize', $data['fav_sound'])) : 'None' ?></p>
        <p><strong>Favorite Foods:</strong> <?= isset($data['fav_food']) ? implode(", ", array_map('sanitize', $data['fav_food'])) : 'None' ?></p>

        <p><strong>First Achievement:</strong> <?= sanitize($data['first_achievement']) ?></p>
        <p><strong>First Risk:</strong> <?= sanitize($data['first_risk']) ?></p>
        <p><strong>First Grown-up Thing:</strong> <?= sanitize($data['first_grownup']) ?></p>
        <p><strong>First Time Happy:</strong> <?= sanitize($data['first_Happy']) ?></p>
        <p><strong>First Friend:</strong> <?= sanitize($data['first_friend']) ?></p>

        <p><strong>Last Cry:</strong> <?= sanitize($data['last_cry']) ?></p>
        <p><strong>Last Trip:</strong> <?= sanitize($data['last_trip']) ?></p>
        <p><strong>Last Song:</strong> <?= sanitize($data['last_song']) ?></p>
        <p><strong>Before Sleep:</strong> <?= sanitize($data['last_sleep']) ?></p>
        <p><strong>Feeling Today:</strong> <?= sanitize($data['feeling']) ?></p>
        <p><strong>Dedication:</strong><br> <?= nl2br(sanitize($data['dedication'])) ?></p>

        <?php if (!empty($_SESSION['photo_path'])): ?>
            <p><strong>Your Uploaded Photo:</strong></p>
            <img class="preview" src="<?= sanitize($_SESSION['photo_path']) ?>" alt="Uploaded Photo">
        <?php endif; ?>

        <div class="btn-group">
            <form action="slum_output.php" method="POST">
                <button class="confirm" type="submit">Confirm and Submit</button>
            </form>
            <form action="javascript:history.back()">
                <button class="edit">Edit</button>
            </form>
        </div>
    </div>
</body>
</html>
