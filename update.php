<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $points = $_POST['points'];
    $dataFile = 'data.json';

    if (file_exists($dataFile)) {
        $players = json_decode(file_get_contents($dataFile), true);
        foreach ($players as &$player) {
            if (isset($points[$player['name']])) {
                $player['points'] = intval($points[$player['name']]);
            }
        }
        file_put_contents($dataFile, json_encode($players, JSON_PRETTY_PRINT));
    }

    header('Location: index.html');
    exit();
}
?>
