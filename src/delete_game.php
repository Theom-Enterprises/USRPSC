<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USRPS Championship 2020 Delete</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            padding: 25px;
        }
    </style>
</head>
<body>
<h1>Gib einen Zeitpunkt ein, welcher gelöscht werden soll</h1>
<form action="delete_game.php" method="post">
    <div class="mb-3">
        <label for="datum" class="form-label">Zeitpunkt</label>
        <input type="date" class="form-control" id="datum" name="datum" required>
    </div>
    <div class="mb-3">
        <label for="zeit" class="form-label">Zeitpunkt</label>
        <input type="time" class="form-control" id="zeit" name="zeit" required>
    </div>
    <button type="submit" class="btn btn-danger">Löschen</button>
    <a href="../index.php">
        <button type="button" class="btn btn-secondary">Zurück</button>
    </a>
</form>
</body>
</html>

<?php

use Doctrine\DBAL\DriverManager;

require_once '../vendor/autoload.php';

$connectionParams = [
    'url' => 'sqlite:///../db.sqlite',
];

if (isset($_POST['datum'])) {
    try {
        $conn = DriverManager::getConnection($connectionParams);

        $currentDate = new DateTime();

        echo $_POST['datum'] . ' ' . $_POST['zeit'];

        $conn->delete('RUNDE', [
            'zeitpunkt' => $_POST['datum'] . ' ' . $_POST['zeit']
        ]);
    } catch (\Doctrine\DBAL\Exception $e) {
        echo $e->getMessage();
    }
}