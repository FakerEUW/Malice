<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Fantasy;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage('Connexion to database has failed'));
};

$req = $bdd->query('SELECT * FROM projets');
$textdatas = $req->fetchAll();
echo json_encode($textdatas);
?>