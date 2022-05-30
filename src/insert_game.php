<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USRPS Championship 2020 Insert</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            padding: 25px;
        }
    </style>
</head>
<body>

<form action="insert_game.php" method="post">
    <div class="mb-3">
        <label for="spieler1" class="form-label">1. Spieler</label>
        <input type="text" class="form-control" id="spieler1" name="spieler1" required>
    </div>
    <div class="mb-3">
        <label for="spieler2" class="form-label">2. Spieler</label>
        <input type="text" class="form-control" id="spieler2" name="spieler2" required>
    </div>
    <div class="mb-3">
        <label for="symbol1" class="form-label">Symbol des 1. Spieler</label>
        <input type="text" class="form-control" id="symbol1" name="symbol1" required>
    </div>
    <div class="mb-3">
        <label for="symbol2" class="form-label">Symbol des 2. Spieler</label>
        <input type="text" class="form-control" id="symbol2" name="symbol2" required>
    </div>
    <button type="submit" class="btn btn-primary">Hinzufügen</button>
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

if (isset($_POST['spieler1'])) {
    try {
        $conn = DriverManager::getConnection($connectionParams);

        $currentDate = new DateTime();

        $conn->insert('RUNDE', [
            'zeitpunkt' => $currentDate->format('Y-m-d H:i:s'),
            'spieler1' => $_POST['spieler1'],
            'spieler2' => $_POST['spieler2'],
            'symbol1' => $_POST['symbol1'],
            'symbol2' => $_POST['symbol2']
        ]);
    } catch (\Doctrine\DBAL\Exception $e) {
        echo $e->getMessage();
    }
}