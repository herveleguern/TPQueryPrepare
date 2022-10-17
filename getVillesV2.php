<?php
//V2 requete EXECUTE
$dsn = 'mysql:dbname=voyage;host=localhost';
try {
    $db = new PDO($dsn, 'root', '');  //connexion MySQL Laragon
    echo 'connexion dbvoyage OK';
} catch (PDOException $e) {
    echo $e->getMessage();
}
echo '<h3>Voir une ville</h3>';
//parametre idVille méthode GET (ou POST si formulaire)
$idVille=$_GET['idVille'];
$txtReq = "select id,nom from ville where id = :idVille";
$req = $db->prepare($txtReq);
$req->bindValue("idVille", $idVille, PDO::PARAM_INT);
$req->execute();
$uneVille = $req->fetch(PDO::FETCH_ASSOC);
while ($uneVille != FALSE) {
    foreach ($uneVille as $cle => $valeur) {
        echo $cle, ' : ', $valeur, ' ';
    }
    echo '<br>';
    $uneVille = $req->fetch(PDO::FETCH_ASSOC);
}
$req->closeCursor();
?>