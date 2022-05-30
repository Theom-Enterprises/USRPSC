<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>USRPS Championship 2020 Prototype</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body {
            padding: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1>USRPS Championship 2022</h1>
<div id="games">
    <h2>Game Rounds</h2>
    <div class="row">
        <?php
        use Doctrine\DBAL\DriverManager;

        require_once 'vendor/autoload.php';

        $connectionParams = [
            'url' => 'sqlite:///db.sqlite',
        ];

        try {
            $conn = DriverManager::getConnection($connectionParams);

            $games = $conn->fetchAllAssociative('SELECT * FROM RUNDE');
        } catch (\Doctrine\DBAL\Exception $e) {
            echo $e->getMessage();
        }

        foreach ($games as $game) {
            echo '<div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">';
            echo '<h5 class="card-title">' . $game['zeitpunkt'] . '</h5>';
            echo '<h5 class="card-subtitle text-muted">' . $game['spieler1'] . ' vs ' . $game['spieler2'] . '</h5><br>';
            echo '<div class="card-text">';
            echo '<p>Symbol von ' . $game['spieler1'] . ': ' . $game['symbol1'] . '</p>';
            echo '<p>Symbol von ' . $game['spieler2'] . ': ' . $game['symbol2'] . '</p>';
            echo '</div>
                    </div>
                        </div>
                            </div>';
        }
        ?>
    </div>
</div>
<a href="src/insert_game.php">
    <button class="btn btn-primary">Neuen Eintrag hinzufügen</button>
</a>
<a href="src/delete_game.php">
    <button class="btn btn-danger">Einen Eintrag löschen</button>
</a>
</body>
</html>