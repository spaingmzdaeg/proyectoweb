<?php
$action = $_REQUEST['action'];


if (!empty($action)) {
    require_once 'includes/Player.php';
    $obj = new Player();
}

if ($action == 'adduser' && !empty($_POST)) {
    $id_team = $_POST['id_team'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $kit = $_POST['kit'];
    $position = $_POST['position'];
    $country = $_POST['country'];
    $photo = $_FILES['photo'];
    $playerId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';

    // file (photo) upload
    $imagename = '';
    if (!empty($photo['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $playerData = [
            'id_team' => $id_team,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'kit' => $kit,
            'position' => $position,
            'country' => $country,
            'photo' => $imagename,
        ];
    } else {
        $playerData = [
            'id_team' => $id_team,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'kit' => $kit,
            'position' => $position,
            'country' => $country,
        ];
    }

    if ($playerId) {
        $obj->update($playerData, $playerId);
    } else {
        $playerId = $obj->add($playerData);
    }

    if (!empty($playerId)) {
        $player = $obj->getRow('id_player', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "getusers") {
    $page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $limit = 4;
    $start = ($page - 1) * $limit;

    $players = $obj->getRows($start, $limit);
    if (!empty($players)) {
        $playerslist = $players;
    } else {
        $playerslist = [];
    }
    $total = $obj->getCount();
    $playerArr = ['count' => $total, 'players' => $playerslist];
    echo json_encode($playerArr);
    exit();
}

if ($action == "getuser") {
    $playerId = (!empty($_GET['id_player'])) ? $_GET['id_player'] : '';
    if (!empty($playerId)) {
        $player = $obj->getRow('id_player', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "deleteuser") {
    $playerId = (!empty($_GET['id_player'])) ? $_GET['id_player'] : '';
    if (!empty($playerId)) {
        $isDeleted = $obj->deleteRow($playerId);
        if ($isDeleted) {
            $message = ['deleted' => 1];
        } else {
            $message = ['deleted' => 0];
        }
        echo json_encode($message);
        exit();
    }
}

if ($action == 'search') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchPlayer($queryString);
    echo json_encode($results);
    exit();
}

if ($action == 'search2') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchPlayerLastName($queryString);
    echo json_encode($results);
    exit();
}

if ($action == 'search3') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchPlayerCountry($queryString);
    echo json_encode($results);
    exit();
}

if ($action == 'search4') {
    $queryString = (!empty($_GET['searchQuery'])) ? trim($_GET['searchQuery']) : '';
    $results = $obj->searchPlayerTeam($queryString);
    echo json_encode($results);
    exit();
}


