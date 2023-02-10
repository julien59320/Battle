<?php
require './actions/database.php';
//Validation du formulaire
if(isset($_POST['submit'])){
    //Verifier si user a bien completer tout les champs
    if(!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['password'])){
        //donnée de user
        $name = htmlspecialchars($_POST['name']);
        $lastname = htmlspecialchars($_POST['lastname']);
        $email = htmlspecialchars($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $bourse = 0;
        //Verifier si user existe deja
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT email FROM lanistes WHERE email = ?');
        $checkIfUserAlreadyExists->execute(array($email));

        if($checkIfUserAlreadyExists->rowCount() == 0) {
            //Insert user dans la BDD
            $insertUser = $bdd->prepare('INSERT INTO lanistes( name, lastname, email, password, bourse ) VALUES(?, ?, ?, ?, ?) ');
            $insertUser->execute(array($name, $lastname, $email, $password, $bourse));
            //Récupurer les donnée de user
            $getinfosUser = $bdd->prepare('SELECT id, lastname FROM lanistes WHERE email = ? ') ;
            $getinfosUser->execute(array($email));

            $usersInfos = $getinfosUser->fetch();
            //authentifier user et recupere ses donnée
            $_SESSION['auth'] = true;;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['lastname'];

            //rediriger user
            header('Location: index.php');

        }else{
            $errorMsg = "L'utilisateur existe déja sur le site ";
        }

    }else {
        $errorMsg = "Veuillez compléter tout les champs";
    }

}