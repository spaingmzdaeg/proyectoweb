<?php
$action = $_REQUEST['action'];

if (!empty($action)) {
    require_once 'includes/UserSignup.php';
    $obj = new UserSignup();
}

if ($action == 'adduser' && !empty($_POST)) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = md5($email);
    $password = md5($password);
    
   // $position = $_POST['position'];
   //$country = $_POST['country'];
    //$photo = $_FILES['photo'];
    $userId = (!empty($_POST['userid'])) ? $_POST['userid'] : '';

    // file (photo) upload
    $imagename = '';
    if (!empty($photo['name'])) {
        $imagename = $obj->uploadPhoto($photo);
        $userData = [
            'id_user' => $id_user,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            //'position' => $position,
            //'country' => $country,
           // 'photo' => $imagename,
        ];
    } else {
        $userData = [
            'id_user' => $id_user,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            
        ];
    }

    if ($userId) {
        $obj->update($userData, $userId);
    } else {
        $userId = $obj->add($userData);
    }

    if (!empty($userId)) {
        $user = $obj->getRow('id_user', $userId);
        echo json_encode($user);
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
    $playerArr = ['count' => $total, 'users' => $playerslist];
    echo json_encode($playerArr);
    exit();
}

if ($action == "getuser") {
    $playerId = (!empty($_GET['id_user'])) ? $_GET['id_user'] : '';
    if (!empty($playerId)) {
        $player = $obj->getRow('id_player', $playerId);
        echo json_encode($player);
        exit();
    }
}

if ($action == "deleteuser") {
    $playerId = (!empty($_GET['id_user'])) ? $_GET['id_user'] : '';
    if (!empty($userId)) {
        $isDeleted = $obj->deleteRow($userId);
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
    $results = $obj->searchUser($queryString);
    echo json_encode($results);
    exit();
}
