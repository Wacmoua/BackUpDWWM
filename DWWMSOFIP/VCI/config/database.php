<?php

function connectDb()
{
    try {
        $db = new PDO('mysql:host=' . DBHOST . ':' . DBPORT . ';dbname=' . DBNAME . ';charset=utf8', DBUSER, DBPWD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } 
    catch (PDOException $e) {
        die('Erreur PDO : ' . $e->getMessage());
    }
}
function disconnectDb(){
    return null;
}
