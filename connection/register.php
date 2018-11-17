<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ProjetPerso;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage('Impossible de se connecter à la base de données'));
};



$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$Email = $_POST['Email'];
$Pseudonyme = $_POST['Pseudonyme'];
$password_customer = $_POST['password_customer'];
$PasswordConfirm = $_POST['PasswordConfirm'];
$date_inscription = date("d/m/Y");


/* if ($liste[$_GET['type']]='terre') {
    $type_prod = 'terre';
}elseif */

if ($password_customer == $PasswordConfirm) {

$req = $bdd->prepare('INSERT INTO register (firstname, lastname, Email, Pseudonyme, password_customer, date_inscription) VALUES (:firstname, :lastname, :Email, :Pseudonyme, :password_customer, :date_inscription)');
$req->execute(array(
    'firstname' => $firstname,
    'lastname' => $lastname,
    'Email' => $Email,
    'Pseudonyme' => $Pseudonyme,
    'password_customer' => $password_customer,
    'date_inscription' => $date_inscription
    ));
}
else {
    return('Verify the password you enter are same');
}

?>