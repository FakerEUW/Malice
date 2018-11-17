<?php

ini_set('display_errors', 1);

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Fantasy;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
    die('Error : ' . $e->getMessage('Connexion to database has failed'));
};

$nom_user = $_POST['nom_user'];
$text_content = $_POST['text_content'];
$project_title = $_POST['project_title'];

$req = $bdd->prepare('INSERT INTO projets (nom_user, text_content, project_title) VALUES (:nom_user, :text_content, :project_title)');
$req->execute(array(
    'nom_user' => $nom_user,
    'text_content' => $text_content,
    'project_title' => $project_title
));

echo 'ty buddy';

?>