<?php
session_start();

require('connect.php');
ini_set('display_errors', 1);
//include("../../../UTILEPHP/fonctions.php");


if (isset($_SESSION['email'])){

    $newquery = "SELECT `nom`,`categories` FROM `Producteurs` WHERE email='".$_SESSION['email']."'";
    $newresult = mysqli_query($connection, $newquery) or die(mysqli_error($connection));
    $resultat = mysqli_fetch_array($newresult);
    $ca = $resultat['nom'];
    $it = unserialize($resultat['categories']);
 

    function betail() {
        $return = array();
        $nb = rand(1,10);
        $loop = 0;
        while ($loop<=$nb) {
            array_push($return,"FR64-700-".rand(10000,99999));
            ++$loop;
        }
        return $return;
    }

/* $nbrEsp= count($especesProd);
    print_r($nbrEsp); */

$space = "&nbsp&nbsp";
$br ="<br>";

  
    $buffer = $buffer2 = "" ;
    
    echo "<div class='row'><div class='col-md-1'></div><table class='col-md-10'><thead><tr><td valign='top'><strong>Espèces : </strong></td>";
    foreach ($it as $prod) {
        echo "<td class='capitalize'>".$prod."</td>";
    }
        echo "</tr</thead><tbody><tr><td valign='top'><strong>Population : </strong></td>";
    foreach ($it as $prod) {
        $betail=betail();

        $ezd = count($betail);
        echo "<td class='capitalize'>".$ezd."</td>";

        $buffer.="<td class='capitalize' valign='top'>";
        foreach($betail as $number) {
            $buffer.="<a href=\"#\" data-toggle=\"modal\" data-target=\"#myModal\">".$number."</a><br>";
        }
        $buffer.="</td>";   
        $buffer2.="<td>".rand(1,$ezd/3)."</td>";
    }

    echo "</tr></tbody><tbody><tr><td valign='top'><strong>Id des bêtes : </strong></td>";
    echo $buffer ;
    echo "</tr></tbody>";

    echo "<tbody><tr><td valign='top'><strong>Naissances en 2018 : </strong></td>";
    echo $buffer2;
    echo "</tr></body></table><div class='col-md-1'></div></div>";

}




?>
