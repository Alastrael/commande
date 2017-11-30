<?php
    include_once("dataAccessCRUD/connexionBDD.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Page test</title>
</head>
<body>
    
        <h1>Les commentaires</h1>

        <!--ne jamais oublier que même si le formulaire ne contient qu'un champ,
        il faut un form -->
    <form id="form1" name="form" action="index.php" method="POST">

        <textarea id="cmt" name="commentaire" rows="10" cols="30">Saisir du texte</textarea> <br>
    
        <input type="submit" name = "envoyer" value=" ENVOYER "/> <br> <br>

        <input type="text" id="lgn" name="login" size="25" placeholder="Login..." maxlength="50" /> <br> <br>
        <input type="text" id="md" name="mdp" size="25" placeholder="Mot de passe..." maxlength="50" /> <br> <br>
        <!-- <input type="submit" name = "connexion" value=" Connexion "/> <br> <br> !-->

    </form>

    <?php
        
        
        if (isset($_POST['envoyer'])) 
        {
            ajouterCom($_POST['commentaire']); //ajouterCom qui est dans connexionBDD
        }

        


        //verifier avec une fonction de hashage le mot de passe de manière absolument sécurisée c'est incroyable,
        //et magique !
        if(isset($_POST['envoyer']))
        {
            $log = $_POST['login'];
            $pass = $_POST['mdp'];

            if(connectivite($log, $pass)) echo "connecté";
            else echo "pas connecté";
            
        }

	?>

</body>

</html>