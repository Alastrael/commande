<?php

function connexion() {

    $host = "localhost";
    $dbname = "testp";
    $utilisateur = "root";
    $mdp = '';

	$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $utilisateur, $mdp)
			or die ("Attention, problème de connexion serveur");
	
	return $pdo;
	
} 



function ajouterCom($text)
{
    $connexion = connexion();
    $sql = "insert into testo values(null, :text)";
    $txt = $text;
    $stmt = $connexion->prepare($sql);
    $stmt->BindValue(':text', $text);
    $stmt->execute();
    $executer = $connexion->exec($sql);
    if($executer===FALSE)
    {
        echo"Connexion à la base de donnée impossible.";
    }
    afficherTexte($text);
}


function afficherTexte()
{
    $connexion = connexion();

    $sql = "select texte from testo";
    $resultat = $connexion->query($sql);

    $tableau = $resultat->fetchAll();

    foreach($tableau as $item)
    {
        echo $item['texte']." ";

    }
}


function connectivite($log, $passwr)
{
    $connexion = connexion();

    $iteration = "select count(*) as nombre from testp.login where login= :id and mdp= :pass";

    $rez = $connexion->prepare($iteration);
    $rez->BindValue(':id',$log);
    $rez->BindValue(':pass',$passwr);

    $execRez = $rez->execute();

    $resultat = $rez->fetchAll();

    print_r($resultat[0]) ;
    if($resultat[0]["nombre"]==1)$vrai = true;
    else $vrai = false;

    return $vrai;

}

function recup($mot)
{
    $connec = connexion();

    $requete = "select mdp from login where login = 'root'";

    $execRequete = $connec->query($requete);

    $resultat = $execRequete->fetch();

    $mdp = $resultat[0];

    return $mdp;
}



?>