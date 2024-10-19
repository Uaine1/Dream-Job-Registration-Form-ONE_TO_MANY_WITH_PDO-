<?php
require_once "dbConfig.php";

function insertIntoGameDevRecords($pdo, $firstName, $lastName, $email, $contactNum, $gender ,$gameEngine, $progLang) {
    $sql = "INSERT INTO game_devs (first_name, last_name, email, contact_num, gender, using_game_engine, known_prog_lang, date_added) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute(array($firstName, $lastName, $email, $contactNum, $gender ,$gameEngine, $progLang, $dateAdded));

    if ($executeQuery){
        return true;
    }
}

function seeAllGameDevRecords($pdo){
    $sql = "SELECT * FROM game_devs";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery){
        return $stmt->fetchAll();
    }
}

function getGameDevByID($pdo, $id){
    $sql = "SELECT * FROM game_devs WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])){
        return $stmt->fetch();
    }
}

function updateGameDev($pdo, $id, $firstName, $lastName, $email, $contactNum, $gender, $gameEngine, $progLang) {
    $sql = "UPDATE game_devs SET first_name = ?, last_name = ?, email = ?, contact_num = ?, gender = ?, using_game_engine = ?, known_prog_lang = ? WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$firstName, $lastName, $email, $contactNum, $gender, $gameEngine, $progLang, $id]);

    if ($executeQuery) {
        return true;
    }
    return false; 
}


function deleteGameDev($pdo, $id){
    $sql = "DELETE FROM game_devs WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery){
        return true;
    }
}

function getProjectByGameDev($pdo, $game_dev_id){
    $sql = "SELECT
        projects.project_id AS project_id,
        projects.project_name AS project_name,
        projects.date_started AS date_started,
        projects.date_finished AS date_finished,
        projects.game_dev_id AS project_dev
        FROM projects
        WHERE projects.game_dev_id = ?";

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$game_dev_id]);
    if ($executeQuery){
        return $stmt->fetchAll();
    }
    return []; 
}

function insertProject($pdo, $project_name, $date_started, $date_finished, $game_dev_id) {
    $sql = "INSERT INTO projects (project_name, date_started, date_finished, game_dev_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_name, $date_started, $date_finished, $game_dev_id]);

    return $executeQuery; // Return true if successful, false otherwise
}


function getProjectByID($pdo, $project_id) {
    $sql = "SELECT
        projects.project_id as project_id,
        projects.project_name as project_name,
        projects.date_started as date_started,
        projects.date_finished as date_finished,
        CONCAT(game_devs.first_name, ' ', game_devs.last_name) AS project_dev
    FROM projects
    JOIN game_devs ON projects.game_dev_id = game_devs.id
    WHERE projects.project_id = ?";  

    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}

function updateProject($pdo, $project_name, $date_started, $date_finished, $project_id) {
    $sql = "UPDATE projects SET project_name = ?, date_started = ?, date_finished = ? WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_name, $date_started, $date_finished, $project_id]);

    if ($executeQuery) {
        return true;
    }
    return false; 
}


function deleteProject($pdo, $project_id){
    $sql = "DELETE FROM projects WHERE project_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$project_id]);
    if ($executeQuery){
        return true;
    }
}
?>