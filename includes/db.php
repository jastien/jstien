<?php
function getDB($db) {
    $host = 'localhost';
    $dbname = $db;
    $username = 'web_user';
    $password = 's3cr3t';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Setting Errorhandling to Exception
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn;
}

function sqlFetchAll($select) {
    global $dbConn;
    $sql = $select;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $pop = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $pop;
}

function sqlFetch($select) {
    global $dbConn;
    $sql = $select;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $pop = $stmt->fetch(PDO::FETCH_ASSOC);
    return $pop;
}
?>